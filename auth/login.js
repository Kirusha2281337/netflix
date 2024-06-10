pass = document.getElementsByName("pass")[0];
pass2 = document.getElementsByName("rptpass")[0];
logfrm = document.getElementById("log");
regfrm = document.getElementById("reg");

function validatePassword(){
    if(pass.value != pass2.value)
    {
      pass2.setCustomValidity(pass, pass2);
      console.log(pass, pass2);
    } 
    else
    {
      pass2.setCustomValidity('');
    }
}
  
pass.onchange = validatePassword;
pass2.onkeyup = validatePassword;
document.getElementById("btn_reg").addEventListener('click', (event)=>{
  event.preventDefault();
  regfrm.style.display='none';
  logfrm.style.display='grid';
  })
document.getElementById("btn_log").addEventListener('click', (event)=>{
  event.preventDefault();
  logfrm.style.display='none';
  regfrm.style.display='grid';
  })
var scene = document.getElementById('scene');
var parallaxInstance = new Parallax(scene, {
    relativeInput: true
})