<?php

declare(strict_types=1);

namespace App\TeamTrackr\Employees\Infrastructure\Controller;

use App\TeamTrackr\Employees\Application\Find\EmployeeFinder;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/employees/{id}', name: 'employee_get', methods: ['GET'])]
final class EmployeeGetController
{
    public function __construct(private EmployeeFinder $finder)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        $employee = $this->finder->__invoke($request->get('id'));

        return new JsonResponse(
            [
                'id' => $employee->id()->value(),
                'first_name' => $employee->firstName(),
                'last_name' => $employee->lastName(),
                'gender' => $employee->gender(),
                'hire_date' => $employee->hireDate(),
                'birth_date' => $employee->birthDate(),
            ]
        );
    }
}