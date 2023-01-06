const menuHamburger = document.getElementById("top")
var show=false
const afficher=()=>{

/* if (!show){ */
   menuHamburger.style.display= "flex"
   show=true
  // console.log("menu-afficher");
//}
/* else{
   menuHamburger.style.display= "none"
   console.log("menu-caché");
   show=false
}
 */
}

const fermer=()=>{
      menuHamburger.style.display= "none"
  //    console.log("menu-caché");
}