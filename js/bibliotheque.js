$(document).ready(function(){
   		// alert("cool");
         $('.reponse').hide();
   		var item, title, auther, publisher, booklink, bookImg;
   		var outList = document.querySelector('.resultat_plus_plus');
   		var bookUrl = "https://www.googleapis.com/books/v1/volumes?q=";
   		var placeHldr = 'https://via.placeholder.com/150';
   		var searchData;

   		$(document).on('click','#search_valider', function(){
   			outList.innerHtml="";
   			searchData = $('#search_text').val();

   			if (searchData=='' || searchData==null) {

   				alert("veillez entrer le nom de cours");
   			}
   			else{
               var searchData_url = '"'+searchData+'"';
   				$.ajax({
   					url: "https://www.googleapis.com/books/v1/volumes?q="+searchData_url,
   					// dataType:"json",
   					success:function(res){
   						
   						if (res.responce===0) {
   							alert("aucun livre trouvé. veillez-ressayer plus tard");
   						}
   						else{
   						   // $('.resultat_plus_plus').html();
                        displayResult(res);

   						}
   					},
   					error: function(){
   						alert("rien n'a été trouvé");
   					}


   				});
   			}

   			// $('#search_text').val("");


   			// alert(searchData);
   		});

   		function displayResult(res){
   			for (var i =0; i< res.items.length; i=i+2) {
   				console.log(res.items[i]);
   				var item = res.items[i];
   				var title1 = item.volumeInfo.title;
   				var auther1 = item.volumeInfo.authors;
   				var publisher1 = item.volumeInfo.publisher;
   				var booklink1 = item.volumeInfo.previewLink;
   				var bookIsbn = item.volumeInfo.industryIdentifiers[1].identifier;
   				var bookImg1 = (item.volumeInfo.imageLinks) ? item.volumeInfo.imageLinks.thumbnail:placeHldr;
               var description1 = item.volumeInfo.description;
               var language1 =item.volumeInfo.language;
               var pageCount1 = item.volumeInfo.pageCount;



   				var item2 = res.items[i+1];
   				var title2 = item2.volumeInfo.title;
   				var auther2 = item2.volumeInfo.authors;
   				var publisher2 = item2.volumeInfo.publisher;
   				var booklink2 = item2.volumeInfo.previewLink;
   				var bookIsbn2 = item2.volumeInfo.industryIdentifiers[0].identifier;
   				var bookImg2 = (item2.volumeInfo.imageLinks) ? item.volumeInfo.imageLinks.thumbnail:placeHldr;
               var description2 = item2.volumeInfo.description;
               var language2 =   item2.volumeInfo.language;
               var pageCount2 = item2.volumeInfo.pageCount;



               var item3 = res.items[i+2];
               var title3 = item3.volumeInfo.title;
               var auther3 = item3.volumeInfo.authors;
               var publisher3 = item3.volumeInfo.publisher;
               var booklink3 = item3.volumeInfo.previewLink;
               var bookIsbn3 = item3.volumeInfo.industryIdentifiers[0].identifier;
               var bookImg3 = (item3.volumeInfo.imageLinks) ? item.volumeInfo.imageLinks.thumbnail:placeHldr;
               var description3 = item3.volumeInfo.description;
               var language3 =   item3.volumeInfo.language;
               var pageCount3 = item3.volumeInfo.pageCount;

               var item4 = res.items[i+3];
               var title4 = item4.volumeInfo.title;
               var auther4 = item4.volumeInfo.authors;
               var publisher4 = item4.volumeInfo.publisher;
               var booklink4 = item4.volumeInfo.previewLink;
               var bookIsbn4 = item4.volumeInfo.industryIdentifiers[0].identifier;
               var bookImg4 = (item4.volumeInfo.imageLinks) ? item.volumeInfo.imageLinks.thumbnail:placeHldr;
               var description4 = item4.volumeInfo.description;
               var language4 =   item4.volumeInfo.language;
               var pageCount4 = item4.volumeInfo.pageCount;



               var item5 = res.items[i+4];
               var title5 = item5.volumeInfo.title;
               var auther5 = item5.volumeInfo.authors;
               var publisher5 = item5.volumeInfo.publisher;
               var booklink5 = item5.volumeInfo.previewLink;
               var bookIsbn5 = item5.volumeInfo.industryIdentifiers[0].identifier;
               var bookImg5 = (item5.volumeInfo.imageLinks) ? item.volumeInfo.imageLinks.thumbnail:placeHldr;
               var description5 = item5.volumeInfo.description;
               var language5 =   item5.volumeInfo.language;
               var pageCount5 = item5.volumeInfo.pageCount;


               var item6 = res.items[i+5];
               var title6 = item6.volumeInfo.title;
               var auther6 = item6.volumeInfo.authors;
               var publisher6 = item6.volumeInfo.publisher;
               var booklink6 = item6.volumeInfo.previewLink;
               var bookIsbn6 = item6.volumeInfo.industryIdentifiers[0].identifier;
               var bookImg6 = (item6.volumeInfo.imageLinks) ? item.volumeInfo.imageLinks.thumbnail:placeHldr;
               var description6 = item6.volumeInfo.description;
               var language6 =   item6.volumeInfo.language;
               var pageCount6 = item6.volumeInfo.pageCount;

   				// outList.innerHtml="cool";

   				var cool =''+
               formatoutput(bookImg1,title1,auther1,publisher1,booklink1,bookIsbn,description1,language1,pageCount1)+
               formatoutput(bookImg2,title2,auther2,publisher2,booklink2,bookIsbn2,description2,language2,pageCount2)+
               formatoutput(bookImg3,title3,auther3,publisher3,booklink3,bookIsbn3,description3,language3,pageCount3)+
               formatoutput(bookImg4,title4,auther4,publisher4,booklink4,bookIsbn4,description4,language4,pageCount4)+
               formatoutput(bookImg5,title5,auther5,publisher5,booklink5,bookIsbn5,description5,language5,pageCount5)+
               formatoutput(bookImg6,title6,auther6,publisher6,booklink6,bookIsbn6,description6,language6,pageCount6)+
   				 '';

                 $('.resultat_plus_plus').html(cool);


   			}
   		}

   		function formatoutput(bookImg,title,auther,publisher,booklink,bookIsbn,description,language,pageCount){

            // var viewerurl ="book.php?isbn="+bookIsbn;
            var base_url = "http://localhost/ProjetBibliotheque/";
   			var viewerurl = base_url+'notification/savoir_su_livre/'+bookIsbn;
   			var htmlCard = `

            <div class="col-md-4">
                <div class="card">
                    <article class="media body mb-0">

                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-md-4">

                              <div class="mr-12 img-responsive" align="center">
                                  <img class="img-thumbnail" src="${bookImg}" alt="" width="150" height="100">
                              </div>
                              
                            </div>
                            <div class="col-md-8">
                              <div class="media-body">
                                  <div class="content">
                                    <p class="h5 text-left">
                                      <a href="#" class="text-primary">
                                        ${title}
                                      </a>
                                  </p>

                                    <p class="h6"><b>Auteur:</b>${auther} <small class="float-right text-muted"></small></p>

                                    <p class="h6"><b>Année de publication:</b>${publisher} </p>
                                    
                                  </div>
                                  
                              </div>
                            </div>

                            <div class="col-md-12">
                             
                              <p>
                                  langue du livre: ${language}
                              </p>
                              nombre des pages: <span class="text-info">${pageCount} pages</span>

                              <div class="row">
                              <div class="col-md-12">
                                <a href="javascript:void(0)" class="affichier">
                                  <i class="icon-book-open"></i> Affichier sa description
                                </a>
                              </div>
                              <div class="col-md-12 reponse">
                                <p>${description}</p>

                              </div>
                          </div>


                              <nav class="d-flex text-muted">
                                    <a href="${viewerurl}" class="icon mr-3"><i class="fa fa-repeat"></i> lire le contenu</a>

                                </nav>
                            </div>



                          </div>
                        </div>

                    </article>
                </div>
            </div>

            <br><br>


   			`;

   			return htmlCard;

   		}

         
         $(document).on('click','.voir_plus', function(e){
            e.preventDefault();
            $('.reponse').show();
         });

 });

