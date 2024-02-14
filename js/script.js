var sideBarIsOpen =true;

        togglebtn.addEventListener( 'click', (event) =>  {
            event.preventDefault();

            if(sideBarIsOpen){
                dashboardsidebar.style.width = '3%';
                dashboardsidebar.style.transition = '0.5s all';
                username.style.display = 'none'
                dashboardcontent_container.style.width = '97%';
                sidebartitle.style.fontSize = '20px';
                userimg.style.width='30px';
                userimg.style.position = 'static';
            
                menutext = document.getElementsByClassName('menutext');
                for(var i=0; i < menutext.length;i++){
                    menutext[i].style.display = 'none';
                }

                var menuactiveItems = document.querySelectorAll('.menuactive');
                for (var i = 0; i < menuactiveItems.length; i++) {
                    menuactiveItems[i].style.paddingLeft = '20px';
                }
                sideBarIsOpen= false;
            }
            else{
                dashboardsidebar.style.width = '15%';
                username.style.display = 'block';
                username.style.position = 'relative';
                username.style.left = '50px';
                username.style.bottom = '36px';
                dashboardcontent_container.style.width = '85%';
                sidebartitle.style.fontSize = '40px';
                userimg.style.width='50px';
                userimg.style.position = 'relative';
                userimg.style.right = '20px';
            
                menutext = document.getElementsByClassName('menutext');
                for(var i=0; i < menutext.length;i++){
                    menutext[i].style.display = 'inline-block';
                }

                var menuactiveItems = document.querySelectorAll('.menuactive');
                for (var i = 0; i < menuactiveItems.length; i++) {
                    menuactiveItems[i].style.paddingLeft = '20px';
                }
                sideBarIsOpen = true;
            }
        });