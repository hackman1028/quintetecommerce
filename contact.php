<?php include 'header.php' ?>


<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  margin-top: 6px;
  margin-bottom: 16px;
  resize: vertical;
}

input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container2 {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}



.column1 {
  float: left;
  width: 25%;
  margin-bottom: 16px;
  padding: 0 8px;
}

.card1 {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  margin: 8px;
}

.about-section {
  padding: 50px;
  text-align: center;
  background-color: #474e5d;
  color: white;
}

.container1 {
  padding: 0 300px;
}

.container1::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.container3 {
  padding: 0 16px;
}

.container3::after, .row::after {
  content: "";
  clear: both;
  display: table;
}


.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}

@media screen and (max-width: 650px) {
  .column {
    width: 100%;
    display: block;
  }
}
</style>
</head>



<div class="container1">

<h2>Contact Form</h2>

<div class="container2">
  <form action="contact.php">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="place">Place</label>
    <select id="place" name="place">
      <option value="Kathmandu">Kathmandu</option>
      <option value="Bhaktapur">Bhaktapur</option>
      <option value="Lalitpur">Lalitpur</option>
      <option value="Pokhara">Pokhara</option>
    </select>

    <label for="subject">Subject</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Submit">
  </form>
</div>
</div>




<div class="container2">
<h2 style="text-align:center">Our Team</h2>
<div class="row">
  <div class="column1">
    <div class="card1">
      <img src="img/author/trishant.jpg" alt="Trishant" style="width:100%">
      <div class="container3">
        <h2>Jane Doe</h2>
        <p class="title">CEO & Founder</p>
        <p>trishantsthapit10@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column1">
    <div class="card1">
      <img src="img/author/pratima.jpg" alt="Pratima" style="width:100%">
      <div class="container3">
        <h2>Pratima K.C</h2>
        <p class="title">Art Director</p>
        <p>kcpratima44@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
  
  <div class="column1">
    <div class="card1">
      <img src="img/author/biplav.jpg" alt="Biplav" style="width:100%">
      <div class="container3">
        <h2>Biplav Sainju</h2>
        <p class="title">Designer</p>
        <p>sainjubiplav@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>

  <div class="column1">
    <div class="card1">
      <img src="img/author/anmol.jpg" alt="Anmol" style="width:100%">
      <div class="container3">
        <h2>Anmol Dhakal</h2>
        <p class="title">Designer</p>
        <p>anmoldhakal@gmail.com</p>
        <p><button class="button">Contact</button></p>
      </div>
    </div>
  </div>
</div>

</div>
</body>
</html>
