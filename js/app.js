var adminpanelbtn = document.querySelector('#adminbtn');
var wrapper = document.querySelector('#formwrapper');
 function attack(){
 	// wrapper.innerHTML='<form ><p></p></form>';
 	wrapper.innerHTML= '<div class="col-sm-4 col-sm-offset-4 login"><h3 class="white text-center">HOD Login</h3><form role="form clearfix"><div class="form-group"><label class="sr-only">Username</label><input autofocus required type="text" class="form-control" placeholder="Username"></div><div class="form-group"><label for="pwd" class="sr-only">Password:</label><input required="" type="password" class="form-control" id="pwd" placeholder="Password"></div><button type="submit" class="btn btn-default">login</button></form></div>'; 
 
 }