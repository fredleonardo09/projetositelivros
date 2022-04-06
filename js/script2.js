window.onload= function(){
    let i = 1;
    let start = true;
    let livrosusado = document.getElementById("livrosusado"); 
    let htmlfull = '';
    fetch('http://localhost/LivrosBackEnd/conteudo/usados').then(response => response.json())
    .then(
        data => {             
            data.forEach( livro => {
                console.log(livro);                                                                
                let html = '';
                if ( i == 7  ) {
                	html = "</div> <div class='row'> <div class='col-sm-4'>  <div class='card'> <img class='card-img-top' src= "+livro.imagem+" alt='Card image cap'>   <div class='card-body'> <h4 class='card-title'><a href='pgcomprausado.html' title='View Product'>"+livro.titulo+"</a></h4>  <p class='card-text'>Autor: "+livro.autor+" </p> <p class='card-text'>Ano lançamento: "+livro.anolancamento+" </p>  <p class='card-text'>Estado: "+livro.estado+" </p>  <div class='row'> <div class='col-dm-2'> <p class='btn btn-danger btn-block'> "+livro.Valor+" </p>  </div>  <div class='col-dm-4'>  <a href='#' class='btn btn-success btn-block'>Adicionar ao Carrinho</a> </div> </div>  </div>  </div> </div> ";
		        	htmlfull = htmlfull+html;
			        livrosusado.innerHTML = livrosusado.innerHTML + htmlfull;
                	i = 1;
			        htmlfull = '';
                }
                else { 
		            if (start) { 
                        html = "<div class='row'><div class='col-sm-4'> <div class='card'> <img class='card-img-top' src= "+livro.imagem+" alt='Card image cap'>   <div class='card-body'> <h4 class='card-title'><a href='pgcomprausado.html' title='View Product'>"+livro.titulo+"</a></h4>  <p class='card-text'>Autor: "+livro.autor+" </p> <p class='card-text'>Ano lançamento: "+livro.anolancamento+" </p>  <p class='card-text'>Estado: "+livro.estado+" </p>  <div class='row'> <div class='col-dm-2'> <p class='btn btn-danger btn-block'> "+livro.Valor+" </p>  </div>  <div class='col-dm-4'>  <a href='#' class='btn btn-success btn-block'>Adicionar ao Carrinho</a>  </div> </div> </div> </div> </div> "; 
                        start = false;
                        htmlfull = htmlfull+html;
                    }
		            else {
		                html = "<div class='col-sm-4'> <div class='card'> <img class='card-img-top' src= "+livro.imagem+" alt='Card image cap'>   <div class='card-body'> <h4 class='card-title'><a href='pgcomprausado.html' title='View Product'>"+livro.titulo+"</a></h4>  <p class='card-text'>Autor: "+livro.autor+" </p> <p class='card-text'>Ano lançamento: "+livro.anolancamento+" </p>  <p class='card-text'>Estado: "+livro.estado+" </p>  <div class='row'> <div class='col-dm-2'> <p class='btn btn-danger btn-block'> "+livro.Valor+" </p>  </div>  <div class='col-dm-4'>  <a href='#' class='btn btn-success btn-block'>Adicionar ao Carrinho</a>  </div> </div> </div> </div> </div>";
		                htmlfull = htmlfull+html;
                    }                    
                i++;
                }
            });             
        });
    };