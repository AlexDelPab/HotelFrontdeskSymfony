<?php

namespace AdminBundle\Controller;

use AppBundle\Controller\BaseController;
use AppBundle\Entity\Employer;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class EmployerController
 * @Route("/employee")
 * @package AdminBundle\Controller
 */
class EmployeeController extends BaseController {

    /**
     * @Route("/index", name="employee_index")
     */
    public function indexAction() {
        $repository = $this->getDoctrine()->getRepository(Employer::class);

        $test = $repository->getPutschisLittlePenis();

        $employees = $repository->findAll();

        if (!$employees) {
            $this->createEmployeeEntities();
        }

        return $this->render('@Admin/Employee/index.html.twig', [
            'employees' => $employees,
        ]);
    }

    /**
     * @Route("/create", name="employee_create")
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function createAction(Request $request) {
        if ($this->putOrPost()) {
            $firstName = $this->validateInput($request->get('firstName'));
            $lastName = $this->validateInput($request->get('lastName'));
            $email = $this->validateInput($request->get('email'));
            $street = $this->validateInput($request->get('street'));
            $zip = $this->validateInput($request->get('zip'));
            $city = $this->validateInput($request->get('city'));

            if ($firstName && $lastName && $email && $street && $zip && $city) {
                $employee = new Employer();
                $employee
                    ->setFirstName($firstName)
                    ->setLastName($lastName)
                    ->setEmail($email)
                    ->setZip($zip)
                    ->setStreet($street)
                    ->setCity($city);

                $manager = $this->getDoctrine()->getManager();
                $manager->persist($employee);
                $manager->flush();

                return $this->redirectToRoute('employee_index');
            }
        }

        return $this->render('@Admin/Employee/create.html.twig');
    }

    /**
     * @Route("/{id}/edit", name="employee_edit")
     *
     * @param Employer $employee
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function editAction(Employer $employee, Request $request) {
        if ($this->putOrPost()) {
            $firstName = $this->validateInput($request->get('firstName'));
            $lastName = $this->validateInput($request->get('lastName'));
            $email = $this->validateInput($request->get('email'));
            $street = $this->validateInput($request->get('street'));
            $zip = $this->validateInput($request->get('zip'));
            $city = $this->validateInput($request->get('city'));

            if ($firstName && $lastName && $email && $street && $zip && $city) {
                $employee = new Employer();
                $employee
                    ->setFirstName($firstName)
                    ->setLastName($lastName)
                    ->setEmail($email)
                    ->setZip($zip)
                    ->setStreet($street)
                    ->setCity($city);

                $manager = $this->getDoctrine()->getManager();
                $manager->persist($employee);
                $manager->flush();

                return $this->redirectToRoute('employee_index');
            }
        }

        return $this->render('@Admin/Employee/edit.html.twig', [
            'employee' => $employee
        ]);
    }

    /**
     * @Route("/{id}/delete", name="employee_delete")
     *
     * @param Employer $employer
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function deleteAction(Employer $employer) {
        $manager = $this->getDoctrine()->getManager();
        $manager->remove($employer);
        $manager->flush();

        return $this->redirectToRoute('employee_index');
    }


    //
    // Helper Functions   -------------------------------------------------------------
    //
    private function createEmployeeEntities() {
        $employer = new Employer();
        $employer
            ->setFirstName("Andrea")
            ->setLastName("Maier")
            ->setCity("Linz")
            ->setStreet("Altenberger Str. 69")
            ->setZip(4040)
            ->setEmail("andrea.maier@hotel.com")
            ->setCountry("Austria");

        $employer2 = clone $employer;
        $employer
            ->setFirstName("Daniel")
            ->setLastName("Putschögl")
            ->setEmail("daniel.putschoegl@hotel.com");


        $employer3 = clone $employer;
        $employer
            ->setFirstName("Thomas")
            ->setLastName("Lichtenauer")
            ->setEmail("thomas.lichtenauer@hotel.com");


        $employer4 = clone $employer;
        $employer
            ->setFirstName("Matthias")
            ->setLastName("Ettl")
            ->setEmail("matthias.ettl@hotel.com");


        $employer5 = clone $employer;
        $employer
            ->setFirstName("Alexander")
            ->setLastName("Pabinger")
            ->setEmail("alexander.pabinger@hotel.com");


        $manger = $this->getDoctrine()->getManager();
        $manger->persist($employer);
        $manger->persist($employer2);
        $manger->persist($employer3);
        $manger->persist($employer4);
        $manger->persist($employer5);

        $manger->flush();

    }

}
