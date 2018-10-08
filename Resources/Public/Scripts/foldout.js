/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


$('.dropdown ul.dropdown-menu .has-submenu').hover(
    function(){
      w=$(window).width();
      $ul=$(this).find('.dropdown-menu-foldout');
      $arrow=$(this).find('.dropdown-menu-foldout ~ .divarrow-right');
      $ul.show();
      x=$ul.offset();
      y=$ul.width();
      
      if (x.left + y > w) {
        $ul.css('left',-y);
        // $ul.css('left',(w - y - x.left));
        // $arrow.removeClass('divarrow-right').addClass('divarrow-left');
      }
      
      },
    function(){
      $ul=$(this).find('.dropdown-menu-foldout');$ul.hide();
    });