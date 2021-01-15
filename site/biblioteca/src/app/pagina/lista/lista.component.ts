import { Component, OnInit } from '@angular/core';
import { LivroService } from 'src/app/services/livro.service';

import { Livro } from './../../livro';

@Component({
  selector: 'app-lista',
  templateUrl: './lista.component.html',
  styleUrls: ['./lista.component.css']
})
export class ListaComponent implements OnInit {

  qtdeLivros: number = 10;
  livros: any;
  
  constructor(private livroService: LivroService) { }

  ngOnInit(): void {
    this.livroService.getLivros().subscribe(
      (data)=> {
        console.log(data['response']['quantidade']);
        this.livros = data['response']['livros'];
      },
      (error)=>{
        console.log(error);
      }
    )
  }

  getQtdeLivros(): number {
    return this.qtdeLivros;
  }

}
