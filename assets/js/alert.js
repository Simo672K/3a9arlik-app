(function(){
  
  setTimeout(function(){
    var alert= document.querySelector(".alert");
    if(alert){
      alert.classList.add("fade");
      setTimeout(()=> alert.remove(), 500);
    }

  }, 2500)
}
)()