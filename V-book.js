
let badhan = document.querySelector(".burger");
let visible = document.querySelector(".visible");
let height = document.querySelector(".height");
let sidebar = document.querySelector(".sidebar");

badhan.addEventListener('click', ()=>{
    sidebar.classList.toggle("visible");
    sidebar.classList.toggle("height");

});


let icon = document.querySelector(".profileicon");
let v = document.querySelector(".visiblity");
let h = document.querySelector(".pheight");
let profile = document.querySelector(".profile");

icon.addEventListener('click', ()=>{
    profile.classList.toggle("visiblity");
    profile.classList.toggle("pheight");
});

window.onscroll = function() {myFunction()};
   function myFunction() {
      let f = document.querySelector("#first");
      if (document.body.scrollTop > 150 || document.documentElement.scrollTop > 150) {
       f.classList.add('scroll-first');
      } else {
        f.classList.remove('scroll-first');
      }

      let p = document.querySelector("#second");
      if (document.body.scrollTop > 500 || document.documentElement.scrollTop > 500) {
         p.classList.add('scroll-second');
        } else {
          p.classList.remove('scroll-second');
        }

        let e = document.querySelector("#third");
        if (document.body.scrollTop > 3075 || document.documentElement.scrollTop > 3075) {
           e.classList.add('scroll-del');
          } else {
            e.classList.remove('scroll-del');
          }  

          let foot = document.querySelector("#four");
          if (document.body.scrollTop > 3075 || document.documentElement.scrollTop > 3075) {
             foot.classList.add('scroll-24');
            } else {
              foot.classList.remove('scroll-24');
            }   
            
          let foo = document.querySelector("#five");
          if (document.body.scrollTop > 3075 || document.documentElement.scrollTop > 3075) {
             foot.classList.add('scroll-m');
            } else {
              foot.classList.remove('scroll-m');
            }   
  
      }
