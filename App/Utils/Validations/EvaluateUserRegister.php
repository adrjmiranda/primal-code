<?php

namespace App\Utils\Validations;

use App\Models\UserModel;

class EvaluateUserRegister
{
  private function isValidName(string $name): bool
  {
    $pattern = '/^(?!.*\s{2,})[A-Za-zÀ-ÿ]+(?: [A-Za-zÀ-ÿ]+)*$/';
    return preg_match($pattern, $name);
  }

  private function emailAlreadyRegistered(string $email): bool
  {
    $entity = (new UserModel)->findOne('email', $email) ?? null;
    return ($entity instanceof UserModel);
  }

  private function isValidEmail(string $email): bool
  {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
  }

  private function isValidPassword(string $password): bool
  {
    $pattern = '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,20}$/';
    return preg_match($pattern, $password);
  }

  public function getErrors(array $data): array
  {
    $errors = [];

    foreach ($data as $key => $value) {
      switch ($key) {
        case 'name':

          if (!$this->isValidName($value)) {
            $errors['name'] = 'Invalid name';
          }

          break;

        case 'email':

          if ($this->emailAlreadyRegistered($value)) {
            $errors['email'] = 'This email address is already registered';
          } else if (!$this->isValidEmail($value)) {
            $errors['email'] = 'Invalid email';
          }

          break;

        case 'password':

          if (!$this->isValidPassword($value)) {
            $errors['password'] = 'Invalid password (allowed: letters and numbers and 8-20 characters)';
          }

          break;

        case 'password_confirmation':

          if (!$this->isValidPassword($value)) {
            $errors['password_confirmation'] = 'Invalid password (allowed: letters and numbers and 8-20 characters)';
          }

          break;

        case 'password_confirmation_match':

          if ($value['password'] !== $value['password_confirmation']) {
            $errors['password_confirmation'] = 'Password confirmation is incorrect';
          }

          break;
      }
    }

    return $errors;
  }
}