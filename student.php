<?php

class student{
 public $name;   
 public $age;   
 public $studentID;   
 

 function __construct($name, $age, $studentID){
    $this->name = $name;
    $this->age = $age;
    $this->studentID = $studentID;
 }

 function __destruct(){
    echo "Student $this->name $this->age years old with ID of $this->studentID";
 }


 function getDetails(){
    return "name: $this->name, age: $this->age, ID: $this->studentID";
 }

function setName($name){
    $this->name = $name;
}

function setAge($age){
    $this->age = $age;
}

function setStudentID($studentID){
    $this->studentID = $studentID;
}

///////

function getName(){
    return $this->name;
}
function getAge(){
    return $this->age;
}
function getStudentID(){
    return $this->studentID;
}

}


/////////


class classroom{
    public $studentsArr = array();

    //////

    function addStudent(student $stu){
        $this->studentsArr[] = ['name' => $stu->name, 'age' => $stu->age, 'studentID' => $stu->studentID];
    }

    function removeStudent($id){
        $tempArr = array();
        foreach($this->studentsArr as $stu){
            if($stu['studentID'] != $id){
                $tempArr[] = $stu;
            }
        }
        $this->studentsArr = $tempArr;
    }

    function listStudents(){
        foreach($this->studentsArr as $stu){
    echo "name: ". $stu['name'].", age: ".$stu['age'].", ID: ".$stu['studentID']. "<br>";
        }
}
}


$sara = new student('sara', 17, 1918);
$omar = new student('omar', 16, 1723);
$mona = new student('mona', 17, 2013);


$class1 = new classroom();
$class1->addStudent($sara);
$class1->addStudent($omar);
$class1->addStudent($mona);

///////

$class1->removeStudent($sara->getStudentID());

//////

$class1->listStudents();

?>