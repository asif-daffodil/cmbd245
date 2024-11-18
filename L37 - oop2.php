<?php
// namespace
namespace student;

// interface
interface studentInfo
{
    public function studentName(): string;
    public function studentAge(): string;
}

abstract class studentInfo2 implements studentInfo
{
    public string $name = "Md Alamin";
    private string $phone = "01700000000";
    public int $age = 25;

    public function studentAge(): string
    {
        return "Student age is : " . $this->age;
    }

    public function studentName(): string
    {
        return "Student name is : " . $this->name . " and phone number is : " . $this->phone . " and " . $this->studentAge();
    }

    public function __construct()
    {
        echo "This is a constructor <br>";
    }

    public function __destruct()
    {
        echo "This is a destructor <br>";
    }

    // Magic methods
    public function __get(string $property): void
    {
        echo "You are trying to access non-existing or private property ($property)";
    }

    public function __set(string $property, string $value): void
    {
        echo "You are trying to set non-existing or private property ($property) with value ($value)<br>";
    }

    // abstract method
    abstract public function address(): string;
}



$student = new class extends studentInfo2
{
    public string $area = "Dhanmondi";
    public string $city = "Dhaka";
    public string $country = "Bangladesh";

    public function address(): string
    {
        return $this->area . ", " . $this->city . ", " . $this->country;
    }
};

$student->name = "Md Rubel";
echo $student->studentName() . "<br>";
echo $student->city . "<br>";
$student->city = "Dhaka";
echo $student->address() . "<br>";

// Final 
final class studentInfo3 extends studentInfo2
{
    final public function address(): string
    {
        return "This is a final method";
    }

    public function __construct()
    {
        return;
    }

    public function __destruct()
    {
        return;
    }
}

$student2 = new studentInfo3();

// Object Cloning
$student3 = clone $student2;
echo $student3->address() . "<br>";

// Comparing Objects

$student4 = new studentInfo3();
$student5 = new studentInfo3();

if ($student4 == $student5) {
    echo "Both objects are equal <br>";
} else {
    echo "Both objects are not equal <br>";
}

// Late Static Bindings
class studentInfo4
{
    public static function studentAge(): string
    {
        return "Student age is : " . static::$age;
    }
}

class studentInfo5 extends studentInfo4
{
    public static int $age = 25;
}

echo studentInfo5::studentAge() . "<br>";

// Objects and references
$student6 = new studentInfo5();
$student7 = $student6;
$student7::$age = 30;
echo studentInfo5::studentAge() . "<br>";

// Object Serialization
$student8 = new studentInfo5();
$student8 = serialize($student8);
echo $student8 . "<br>";

// Traits
trait studentInfo6
{
    public function studentName(): string
    {
        return "Student name is : " . $this->name;
    }

    public function studentAge(): string
    {
        return "Student age is : " . $this->age;
    }
}

class studentInfo7
{
    use studentInfo6;
    public string $name = "Md Alamin";
    public int $age = 25;
}
