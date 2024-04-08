<!DOCTYPE html>
<html lang="en">
<head>
  <title>Movies</title>
  <meta charset="utf-8" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"  crossorigin="anonymous">
  <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&display=swap" rel="stylesheet">
  <style>
    body{
      height: 90vh;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      font-family: 'Roboto', sans-serif;
      background: linear-gradient(to right, #6dd5ed, #2193b0);
    }
    form{
      margin-top: 10px;
      font-style: oblique;
      font-size: 30px;
      border: 1px solid #ddd;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
  background: white;
    }
    #form-input{
      padding: 10px;
      font-size: 15px;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-shadow: inset 0 1px 3px rgba(0,0,0,0.1);
      transition: border-color 0.3s ease-in-out;
    }
    #form-input:focus {
      border-color: #A1C398; 
      outline: none;
    }
    input[type=button]{
      background-color: #A1C398; 
      border: none;
      color: white;
      padding: 15px 32px;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 16px;
      border-radius: 5px;
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
      transition: all 0.3s ease-in-out;
    }
    input[type=button]:hover {
      background-color: #FA7070; 
      box-shadow: 0 6px 12px 0 rgba(0,0,0,0.3);
    }
    ul{
      margin-top: 25px;
      height: 250px;
      overflow-y: scroll;
    }
    li{
      text-align: center;
      display: inline-block;
      width: 250px;
      height: 50px;
      cursor: pointer;
      float: left;
      margin-right: 50px;
      margin-bottom: 75px;
      transition: transform.3s;
    }
    li:hover{
      color: #fff;
  background-color: #2193b0;
  box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);  
      transform: scale(1.1);
    }
    li:active{
      transform: scale(1);
    }
    #scroll{
      margin-top: 20px;
    }
    p{
      margin-bottom: 5px;
      margin-top: 1px;
    }
    img {
      max-width: 100%;
      height: auto;
    }
    @media only screen and (max-width: 600px) {
      body {
        flex-direction: column;
      }
      #form-input, input[type=button], li {
        width: 100%; 
        margin: 10px 0; 
      }
      #preview {
        flex-direction: column;
      }
      #poster {
        width: 100%;
      }
    }
    #preview {
      display: flex;
      justify-content: space-between;
      align-items: flex-start;
    }
    #title {
  font-size: 24px;
  font-weight: bold;
  color: #333;
}
#success-message {
  position: fixed;
  bottom: 20px;
  left: 50%;
  transform: translateX(-50%);
  z-index: 1000;
}
@keyframes pulse {
  0% {
    transform: scale(1);
    box-shadow: 0 0 0 0 rgba(76, 175, 80, 0.7);
  }
  70% {
    transform: scale(1.05);
    box-shadow: 0 0 0 10px rgba(76, 175, 80, 0);
  }
  100% {
    transform: scale(1);
    box-shadow: 0 0 0 0 rgba(76, 175, 80, 0);
  }
}

input[type=button] {
  animation: pulse 2s infinite;
}
  </style>
</head>

<body onload="initialize();">
  <form>
    <label>Movie title: <input type="text" id="form-input" /></label>
    <input type="button" onclick="sendRequest();" value="Display Info" />
  </form>

  <div id="output" style="margin-left:75px;">
    <ul id='movielist' style="list-style:none">

    </ul>
    <p style="text-align:center" id="scroll"></p>
  </div>
  <div id="preview" style="margin-top:10px;">
    <div style="width:35%; display:inline; float:left">
    <img alt="" id="poster" style="width:425px;height:400px;">
    <input type="button" onclick="saveMovie();" value="Save Movie" disabled />
  </div>
  <div style="width:65%; display:inline; float:left; font-size:20px">
    <p id="title"></p>
    <p id="cast"></p>
    <p id="genres"></p>
    <p id="overview"></p>
  </div>
  </div>

  <div id="success-message" class="alert alert-success" role="alert" style="display: none;">
    Movie saved successfully!
  </div>

  <script type="text/javascript" src="movies.js"></script>
</body>

</html>