const express = require('express');
const router = express.Router();
const mysql = require('../mysql').pool;

router.get('/', (req, res, next) => {

    mysql.getConnection((error,conn) => {

        if(error) { return res.status(500).send({error:error}); }

        conn.query(
            'SELECT * FROM con_livro;',
            (error, result, fields) => {
                conn.release();

                if(error) { return res.status(500).send({error:error}); }

                const response = {
                    quantidade: result.length,
                    livros: result.map(liv => {
                        return {
                            id: liv.id,
                            nome: liv.nm_livro,
                            request: {
                                tipo: "GET",
                                descricao: 'Retorna detalhes de um livro específico',
                                url: 'http://localhost:3000/livros/'+liv.id

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
    const livro = {
        nome: req.body.nome,
        slug: req.body.slug,
        descricao: req.body.descricao,
        imagem: req.body.imagem,
        status: req.body.status,
        dtCadastro: req.body.dt_cadastro,
        publicado: req.body.publicado,
        ativo: req.body.ativo
    }

    mysql.getConnection((error, conn) => {

        if(error) { return res.status(500).send({error:error}); }

        const sql = 'INSERT INTO con_livro(nm_livro, slug, descricao, imagem, status, dt_cadastro, publicado, ativo) VALUES (?,?,?,?,?,?,?,?)';
        const values = [
            livro.nome,
            livro.slug,
            livro.descricao,
            livro.imagem,
            livro.status,
            livro.dtCadastro,
            livro.publicado,
            livro.ativo
        ];
        conn.query(
            sql, 
            values, 
            (error, result, fields) => {
                conn.release();

                if(error) { return res.status(500).send({error:error}); }

                const response = {
                    mensagem: 'Livro inserido com sucesso',
                    livroCriado: {
                        id_livro: result.insertId,
                        nome: req.body.nome,
                        slug: req.body.slug,
                        descricao: req.body.descricao,
                        imagem: req.body.imagem,
                        status: req.body.status,
                        dtCadastro: req.body.dt_cadastro,
                        publicado: req.body.publicado,
                        ativo: req.body.ativo,
                        request: {
                            tipo: "GET",
                            descricao: 'Retorna todos os livros',
                            url: 'http://localhost:3000/livros/'

                        }
                    }
                }

                return res.status(201).send({response});
            }
        );
    });

    
});

router.get('/:id_livro', (req, res, next) => {
    mysql.getConnection((error,conn) => {

        if(error) { return res.status(500).send({error:error}); }

        conn.query(
            'SELECT * FROM con_livro WHERE id=?;',
            [req.params.id_livro],
            (error, result, fields) => {
                conn.release();

                if(error) { return res.status(500).send({error:error}); }

                if (result.length == 0) {
                    return res.status(404).send({
                        mensagem: 'Não foi encontrado livro com este ID'
                    })
                }

                const response = {
                    mensagem: 'Livro encontrado com sucesso',
                    livroCriado: {
                        id_livro: result[0].id_livro,
                        nome: result[0].nome,
                        slug: result[0].slug,
                        descricao: result[0].descricao,
                        imagem: result[0].imagem,
                        status: result[0].status,
                        request: {
                            tipo: "GET",
                            descricao: 'Retorna todos os livros',
                            url: 'http://localhost:3000/livros/'

                        }
                    }
                }

                return res.status(200).send({response});
            }
        );

    });
});

router.patch('/', (req, res, next) => {
    const livro = {
        nome: req.body.nome,
        slug: req.body.slug,
        descricao: req.body.descricao,
        imagem: req.body.imagem,
        status: req.body.status,
        dtAlt: req.body.dt_alt,
        id: req.body.id
    }

    mysql.getConnection((error, conn) => {

        if(error) { return res.status(500).send({error:error}); }

        const sql = `UPDATE con_livro
                    SET nm_livro    = ?,
                        slug        = ?,
                        descricao   = ?,
                        imagem      = ?,
                        status      = ?,
                        dt_alt      = ?
                    WHERE id    = ?`;
        const values = [
            livro.nome,
            livro.slug,
            livro.descricao,
            livro.imagem,
            livro.status,
            livro.dtAlt,
            livro.id
        ];
        conn.query(
            sql, 
            values, 
            (error, result, fields) => {
                conn.release();

                if(error) { return res.status(500).send({error:error}); }

                const response = {
                    mensagem: 'Livro atualizado com sucesso',
                    livroCriado: {
                        id_livro: req.body.id,
                        nome: req.body.nome,
                        slug: req.body.slug,
                        descricao: req.body.descricao,
                        imagem: req.body.imagem,
                        status: req.body.status,
                        dtAlt: req.body.dt_alt,
                        request: {
                            tipo: "GET",
                            descricao: 'Retorna detalhes de um livro específico',
                            url: 'http://localhost:3000/livros/'+req.body.id

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

        const sql = `DELETE FROM con_livro WHERE id = ?`;
        const values = [
            req.body.id_livro
        ];
        conn.query(
            sql, 
            values, 
            (error, result, fields) => {
                conn.release();

                if(error) { return res.status(500).send({error:error}); }

                const response = {
                    mensagem: 'Livro removido com sucesso',
                        request: {
                            tipo: "POST",
                            descricao: 'Insere um livro',
                            url: 'http://localhost:3000/livros/',
                            body: {
                                "nome": "String",
                                "slug": "String",
                                "descricao": "String",
                                "imagem": "String",
                                "status": "Number",
                                "dt_cadastro": "Date",
                                "publicado": "Number",
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