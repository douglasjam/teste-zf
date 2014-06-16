teste-zf
========

webservice rest simples com zf2 e doctrine2

exemplo de utilização do zend framework 2 com doctrine

criação de um crud simples para inserção, edição e delete de livros

e api restful json que permite buscar pesquisar livros e ver informações detalhadas de um mesmo


O WebService deve tem os serviços:

/books -> lista os livros existentes 

/books/{x} -> os dados do livro com ID {x} 

O serviço /books deve poder ser filtrado. Sendo assim, as URLs abaixo deverão ser válidas e 

retornar os dados esperados: 

/books?author=J.R.R.+Tolkien 

/books?title=The+Lord 

/books?title=The+Lord&author=J.R.R.+Tolkien

Para acesso ao crud deve-se ir para a home / ou acessar a url /bookscrud
