const express = require('express');
const router = express.Router();
const mysql = require('../mysql').pool;

router.get('/', (req, res, next) => {
    mysql.getConnection((error,conn) => {

        if(error) { return res.status(500).send({error:error}); }

        conn.query(
            `SELECT p.*,
                    l.nm_livro,
                    u.nm_usuario 
            FROM con_pedido p
            INNER JOIN seg_usuario u
                ON p.id_usuario = u.id_seg_usuario
            INNER JOIN con_livro l
                ON p.id_livro = l.id;`,
            (error, result, fields) => {
                conn.release();

                if(error) { return res.status(500).send({error:error}); }

                const response = {
                    quantidade: result.length,
                    pedidos: result.map(ped => {
                        return {
                            id: ped.id,
                            usuario: {
                                id_usuario: ped.id_usuario,
                                nome_usuario: ped.nm_usuario,
                            },
                            livro: {
                                id_livro: ped.id_livro,
                                nome_livro: ped.nm_livro,
                            },
                            status: ped.status,
                            request: {
                                tipo: "GET",
                                descricao: 'Retorna detalhes de um pedido específico',
                                url: 'http://localhost:3000/pedidos/'+ped.id

                            }
                        }
                    })
                }

                return res.status(200).send({response});
            }
        );

    });
});

router.post('/', (req, res, next) => {

    mysql.getConnection((error, conn) => {
        if(error) { return res.status(500).send({error:error}); }
        conn.query(
            'SELECT * FROM con_livro WHERE id = ?;', [req.body.id_livro],
            (error, result, fields) => {
                if(error) { return res.status(500).send({error:error}); }
                if (result.length == 0) {
                    return res.status(404).send({
                        mensagem: 'Não foi encontrado livro'
                    })
                }
                conn.query(
                    'INSERT INTO con_pedido(id_usuario, id_livro, status, dt_cadastro, ativo) VALUES (?,?,?,?,?)', 
                    [
                        req.body.id_usuario,
                        req.body.id_livro,
                        req.body.status,
                        req.body.dt_cadastro,
                        req.body.ativo
                    ], 
                    (error, result, fields) => {
                        conn.release();
        
                        if(error) { return res.status(500).send({error:error}); }
        
                        const response = {
                            mensagem: 'Pedido inserido com sucesso',
                            pedidoCriado: {
                                id_pedido: result.insertId,
                                id_usuario: req.body.id_usuario,
                                id_livro: req.body.id_livro,
                                status: req.body.status,
                                dtCadastro: req.body.dt_cadastro,
                                ativo: req.body.ativo,
                                request: {
                                    tipo: "GET",
                                    descricao: 'Retorna todos os pedidos',
                                    url: 'http://localhost:3000/pedidos/'
        
                                }
                            }
                        }
        
                        return res.status(201).send({response});
                    }
                );
            });
    });

});

router.get('/:id_pedido', (req, res, next) => {
    mysql.getConnection((error,conn) => {

        if(error) { return res.status(500).send({error:error}); }

        conn.query(
            'SELECT * FROM con_pedido WHERE id=?;',
            [req.params.id_pedido],
            (error, result, fields) => {
                conn.release();

                if(error) { return res.status(500).send({error:error}); }

                if (result.length == 0) {
                    return res.status(404).send({
                        mensagem: 'Não foi encontrado pedido com este ID'
                    })
                }

                const response = {
                    mensagem: 'pedido encontrado com sucesso',
                    pedido: {
                        id_pedido: result[0].id_pedido,
                        id_usuario: result[0].id_usuario,
                        id_livro: result[0].id_livro,
                        status: result[0].status,
                        request: {
                            tipo: "GET",
                            descricao: 'Retorna todos os pedidos',
                            url: 'http://localhost:3000/pedidos/'

                        }
                    }
                }

                return res.status(200).send({response});
            }
        );

    });
});

router.patch('/', (req, res, next) => {
    mysql.getConnection((error, conn) => {

        if(error) { return res.status(500).send({error:error}); }
        
        conn.query(
            `UPDATE con_pedido
                    SET status      = ?,
                        dt_alt      = ?
                    WHERE id    = ?`, 
            [
                req.body.status,
                req.body.dt_alt,
                req.body.id
            ], 
            (error, result, fields) => {
                conn.release();

                if(error) { return res.status(500).send({error:error}); }

                const response = {
                    mensagem: 'Pedido atualizado com sucesso',
                    pedido: {
                        id_pedido: req.body.id,
                        status: req.body.status,
                        dtAlt: req.body.dt_alt,
                        request: {
                            tipo: "GET",
                            descricao: 'Retorna detalhes de um pedido específico',
                            url: 'http://localhost:3000/pedidos/'+req.body.id

                        }
                    }
                }

                return res.status(202).send({response});
            }
        );
    });
});

router.delete('/', (req, res, next) => {
    mysql.getConnection((error, conn) => {

        if(error) { return res.status(500).send({error:error}); }

        conn.query(
            `DELETE FROM con_pedido WHERE id = ?`, 
            [req.body.id_pedido], 
            (error, result, fields) => {
                conn.release();

                if(error) { return res.status(500).send({error:error}); }

                const response = {
                    mensagem: 'pedido removido com sucesso',
                        request: {
                            tipo: "POST",
                            descricao: 'Insere um pedido',
                            url: 'http://localhost:3000/pedidos/',
                            body: {
                                "id_usuario": "Number",
                                "id_livro": "Number",
                                "status": "Number",
                                "dt_cadastro": "Date",
                                "ativo": "Number"
                            }

                        }
                    }

                res.status(202).send({response});
            }
        );
    });
});

module.exports = router;