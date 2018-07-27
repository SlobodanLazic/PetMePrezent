// Image Slider
        var images=new Array('Slike/kuca.jpg','Slike/maca.jpg','Slike/macka.jpg','Slike/pas.jpg','Slike/pas-i-macka.jpg');
        var nextimage=0;

        function doSlideshow(){
            if(nextimage>=images.length){nextimage=0;}
            $('.o-nama')
                .css('background-image','url("'+images[nextimage++]+'")')
                .fadeIn(1500,function(){
                    setTimeout(doSlideshow,5000);
                });
        }
            
        doSlideshow();