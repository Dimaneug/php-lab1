<?php


require_once 'vendor/autoload.php';

use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Constraints\Regex;
use Symfony\Component\Validator\Validation;

class User
{

    public int $id;
    public string $name;
    public string $email;
    public string $password;
    public DateTime $userCreateDateTime;

    public function __construct($id, $name, $email, $password, $userCreateDateTime)
    {
        $hasErrors = false;

        //ID
        $validator = Validation::createValidator();
        $validID = $validator->validate($id, [
            new Positive(message: "ID should be positive"),
            new NotBlank(message: "ID should not be blank"),
        ]);
        if (count($validID) !== 0) {
            $hasErrors = true;
            foreach ($validID as $value)
                echo $value->getMessage() . "\n";
        }

        //Name
        $validator = Validation::createValidator();
        $validName = $validator->validate($name, [
            new NotBlank(message: "Name should not be blank"),
            new Length(["min" => 1, "max" => 50, "minMessage" => "Name should be longer than {{ limit }}",
                "maxMessage" => "Name should be shorter than {{ limit }}"]),
            new Regex("/^[A-Z]{1}[a-z]{0,}$/", "Name does not match the template (Alex)")
        ]);
        if (count($validName) !== 0) {
            $hasErrors = true;
            foreach ($validName as $value)
                echo $value->getMessage() . "\n";
        }

        //Email
        $validator = Validation::createValidator();
        $validEmail = $validator->validate($email, [
            new NotBlank(message: "Email should not be blank"),
            new Length(["min" => 5, "max" => 100, "minMessage" => "Email should be longer than {{ limit }}",
                "maxMessage" => "Email should be shorter than {{ limit }}"]),
            new Email(message: "Email does not match the template")
        ]);
        if (count($validEmail) !== 0) {
            $hasErrors = true;
            foreach ($validEmail as $value)
                echo $value->getMessage() . "\n";
        }

        //Date
        $validator = Validation::createValidator();
        $validDate = $validator->validate($userCreateDateTime, [
            new NotBlank(message: "Date should not be blank"),
        ]);
        if (count($validDate) !== 0) {
            $hasErrors = true;
            foreach ($validDate as $value)
                echo $value->getMessage() . "\n";
        }

        //Password
        $validator = Validation::createValidator();
        $validPass = $validator->validate($password, [
            new NotBlank(message: "Password should not be blank"),
            new Length(['min' => 5, 'max' => 50, "minMessage" => "Password should not be shorter than {{ limit }}",
                "maxMessage" => "Password should not be longer than {{ limit }}",
            ])
        ]);
        if (count($validPass) !== 0) {
            $hasErrors = true;
            foreach ($validPass as $value)
                echo $value->getMessage() . "\n";
        }

        if (!$hasErrors) {
            $this->id = $id;
            $this->name = $name;
            $this->email = $email;
            $this->password = $password;
            $this->userCreateDateTime = $userCreateDateTime;
        }
    }
}
