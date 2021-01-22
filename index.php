<?php
    session_start();
    if(isset($_SESSION["isFilled"]))
    {
        // echo "<script>alert('You Have Already Filled the form');</script>";    
        echo "<h1 style='text-align:center  '>You've already filled this form</h1>";
        exit();    
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <!-- CSS only -->
    <title>Document</title>
</head>
<body>
    <div id="main">
       <div id="survey-form-container">
            <h1 id="title">PAI Programmers Survey Form</h1>
            <p id="description">Thanks for filling the form. It will help us to improve our services</p>
            <form action="/" id="survey-form" method="POST">
                <div class="dataContainer">
                    <label class="inputLabel" id="name-label" for="name">Name</label>
                    <input class="inputBox" name="name" type="text" id="name" placeholder="Enter Your Name" required>
                    <span></span>
                </div>
                <div class="dataContainer">
                    <label class="inputLabel" id="email-label" for="email">Email</label>
                    <input class="inputBox" name="email" type="email" placeholder="Enter Your Emaild ID" id="email" required> 
                    <span></span>   
                </div>
                
                <div class="dataContainer">
                    <label class="inputLabel" id="number-label" for="number">Age</label>
                    <input class="inputBox" name="age" type="number" placeholder="Enter Your Age" id="number" required min=10 max = 100> 
                    <span></span>   
                </div>
                <div class="dataContainer">
                    <label class="inputLabel" id="number-label" for="mnumber">Number(Optional)</label>
                    <input class="inputBox" name="number" type="number" placeholder="Enter Your Mobile No." id="mnumber" minlength=10 maxlength = 100> 
                    <span></span>   
                </div >
                <div class="dataContainer">
                    <label class="inputLabel" id="" for="dropdown">What do you do?</label>
                    <select class="inputBox"  name="role" id="dropdown">
                        <option value="Select An Option">Select an option</option>
                        <option value="Sturdent">Student</option>
                        <option value="Full Time Job">Job</option>
                        <option value="Full Time Learner">Freelancing</option>
                        <option value="Prefer not to say">Prefer not to say</option>
                        <option value="Others">Others</option>
                    </select>
                    <span></span> 
                </div>
                <label class="inputLabel" id="number-label" for="refer">Would you recommend PAI Programmers to a friend?</label>

                <div class="dataContainer">
                    <input type="radio" value="Definitely" name = "refer" id="definite" required><label class="radioLable" for="definite">Definitely</label><br>
                    <input type="radio" value="May Be" name = "refer" id="maybe" required><label class="radioLable" for="maybe">May Be</label><br>
                    <input type="radio" value="Not Sure " name = "refer" id="notesure" required><label class="radioLable" for="notesure">Not Sure</label><br>
                </div>
                <div class="dataContainer">
                    <label class="inputLabel" for="feature">What is your favorite feature of PAI Programmers?</label>
                    <select class="inputBox" name="feature" id="feature">
                        <option value="Select An Option">Select an option</option>
                        <option value="Challanges">Challanges</option>
                        <option value="Projects">Projects</option>
                        <option value="Community">Community</option>
                        <option value="Open Source">Open Source</option>
                    </select>
                    <span></span> 
                </div>
                <div class="dataContainer">
                    <label class="inputLabel" for="intrested">What is your intrested field of study?</label>
                    <input class="checkLable" type="checkbox" name="interest[]" id="fweb" value="Frontend Web Development"><label for="fweb">Frontend Web Development</label><br>
                    <input class="checkLable" type="checkbox" name="interest[]" id="bweb" value="Backend Web Development"><label for="bweb">Backend Web Development</label><br>
                    <input class="checkLable" type="checkbox" name="interest[]" id="software" value="Software Development"><label for="software">Software Development</label><br>
                    <input class="checkLable" type="checkbox" name="interest[]" id="cwriting" value="Content Writing"><label for="cwriting">Content Writing</label><br>
                    <input class="checkLable" type="checkbox" name="interest[]" id="gdesign" value="Graphics Design"><label for="gdesign">Graphics Design</label><br>

                    <span></span> <br>
                </div>
                <div class="dataContainer">
                    <label class="inputLabel" id="suggestion-label" for="suggestion">Any Other Suggestions?</label>
                    <textarea class="inputBox" name="suggestion" rows="4" cols="50" placeholder="Write your suggestions here..." id="suggestion" required></textarea>


                    <span></span>   
                </div >
                <input type="submit" id="submit" value="Submit">
            </form>
        </div> 

    </div>
    <script src="https://cdn.freecodecamp.org/testable-projects-fcc/v1/bundle.js"></script>

</body>

</html>
<?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
        echo `Hello World`;

        $servername = "localhost";
        $username = "root";
        $password="";
        $db = "myDB";
        $conn = new mysqli($servername,$username,$password,$db);
        $interest =join(" | ",$_POST["interest"]);
        $query = "insert into Survery_Details(name,email,age,mob_no,role,refer,feature,interest,suggestion) values ('$_POST[name]','$_POST[email]',$_POST[age],'$_POST[number]','$_POST[role]','$_POST[refer]','$_POST[feature]','$interest','$_POST[suggestion]');";
        // Insert Data in table

        if($conn->query($query))
        {
            echo "<script>alert('Thank You for Filling the form');</script>";
            $_SESSION["isFilled"] = TRUE;
            $conn->close();
            echo "<meta http-equiv='refresh' content='0'></meta>";
            exit();
        }
        else{
            // echo "<script>alert('Insertion Failed: $conn->error');</script>";
            echo "Data Not";
        }
        $conn->close();

    }
    

?>
