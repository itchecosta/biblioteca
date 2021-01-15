import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Injectable({
  providedIn: 'root'
})
export class LivroService {

  SERVER_URL = 'http://localhost:3000';

  constructor(private http: HttpClient) { }

  public getLivros(){
    return this.http.get(`${this.SERVER_URL}/livros/`);
  }
}
