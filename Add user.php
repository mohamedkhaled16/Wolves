<html>
<head>
	<title>Add user</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-1.11.2.js"></script>
	<script src="js/bootstrap.min.js"></script>

</head>
<body>
<!-- Creating Nav -->
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
  	<div class="navbar-header">
  	  <a class="navbar-brand" href="#">Wolves Cafeteria</a>  		
  	</div>
  			<ul class="nav navbar-nav">
  				<li class="active"><a href="#">Home</a></li>
  				<li><a href="#">Products</a></li>
  				<li><a href="#">Users</a></li>
  				<li><a href="#">Manual order</a></li>
  				<li><a href="#">Checks</a></li>
  			</ul>

  			<ul class="nav navbar-nav navbar-right">
          <li><a class="navbar-brand" href="#"><img src="img/wolves.png" alt="" height="27" width="30"></a></li>
                <li><a href="#">Admin</a></li>
                </ul>	
  	
  </div>
</nav>

<!-- Creating the text -->

<div class="row">
<div class="col-sm-1"></div>
	<div class="col-sm-3	">
		<h1><code>Add user</code></h1>
	</div>
	<div class="col-sm-4"></div>
	<div class="col-sm-4"></div>
</div>


<!-- Creating the form -->

<div class="row">

<div class="container">
	  <form class="form-horizontal" role="form">

<!-- Name -->   

			<div class="form-group">
   				 <label class="control-label col-sm-2" for="email">Name:</label>
    			 <div class="col-sm-10">
      			 <input type="text" class="form-control" id="name" placeholder="Enter name">
    			 </div>
         	</div>

<!-- Email -->

         <div class="form-group">
    			<label class="control-label col-sm-2" for="email">Email:</label>
   			    <div class="col-sm-10">
      			<input type="email" class="form-control" id="email" placeholder="Enter email">
    		    </div>
  		 </div>


<!-- Password -->


         <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Password:</label>
                <div class="col-sm-10"> 
                <input type="password" class="form-control" id="pwd" placeholder="Enter password">
                </div>
        </div>


<!-- Confirm Password -->


	    <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Confirm your password:</label>
                <div class="col-sm-10"> 
                <input type="password" class="form-control" id="cpwd" placeholder="Confirm your password">
                </div>
        </div>


<!-- Room Number -->

        <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Room no:</label>
                <div class="col-sm-10"> 
      <input type="text" class="form-control" id="roomNo" placeholder="Enter room no." maxlength="4">
                </div>
        </div>



 <!-- Ext -->

        <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Ext:</label>
                <div class="col-sm-10"> 
      <input type="text" class="form-control" id="roomNo" placeholder="Enter Ext no." maxlength="4">
                </div>
        </div>

<!-- Img -->

       <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Profile picture:</label>
                <div class="col-sm-10"> 
       <input type="file" class="form-control" id="pic">
                </div>
        </div>


<!-- Remmber me -->

    
       <div class="form-group">        
             <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                 <label><input type="checkbox"> Remember me</label>
                </div>
             </div>
       </div>


<!-- Submit ** Reset --> 

    <div class="form-group">        
          <div class="col-sm-offset-2 col-sm-10">
             <!-- <button type="submit" class="btn btn-default">Submit</button> -->
              <input type="submit"
                                              value="Save"
                                              id="submit"
                                              class="btn btn-success"/>

                                       
                                       <input type="Reset"
                                              value="Reset"
                                              class="btn btn-danger"/>
         </div>
    </div>
  
      

         </form>
    </div>
</div>







</body>
</html>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        