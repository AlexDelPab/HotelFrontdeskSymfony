<?php

namespace AdminBundle\Controller;

use AppBundle\Controller\BaseController;
use AppBundle\Entity\Reservation;
use AppBundle\Entity\Room;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/reservation")
 */
class ReservationController extends BaseController {

    /**
     * @Route("/index", name="reservation_index")
     */
    public function indexAction() {
        $roomRepository = $this->getDoctrine()->getRepository(Room::class);
        $reservationRepository = $this->getDoctrine()->getRepository(Reservation::class);

        $rooms = $roomRepository->findAll();
        $reservations = $reservationRepository->findAll();

        if (!$rooms) {
            $rooms = $this->createRooms();
        }

        return $this->render('@Admin/Reservation/booking.html.twig', [
            'rooms' => $rooms,
            'reservations' => $reservations,
        ]);
    }

    /**
     * @Route("/create", name="reservation_create")
     */
    public function createAction(Request $request) {
        if ($this->putOrPost()) {
            $arrivalDate = $request->get('arrival_date');
            $departureDate = $request->get('departure_date');
            $room = $request->get('room');
            $guest = $request->get('guest');
            $email = $request->get('email');
            $note = $request->get('note');

            if ($arrivalDate && $departureDate && $room && $guest && $email) {
                $roomRepository = $this->getDoctrine()->getRepository(Room::class);
                $room = $roomRepository->find($room);

                $reservation = new Reservation();
                $reservation->setOccupiedFrom(\DateTime::createFromFormat('d.m.Y', $arrivalDate))
                    ->setOccupiedTo(\DateTime::createFromFormat('d.m.Y', $departureDate))
                    ->setRoom($room)
                    ->setGuests($guest)
                    ->setEmail($email)
                    ->setNote($note);

                $manager = $this->getDoctrine()->getManager();
                $manager->persist($reservation);
                $manager->flush();
            }
        }

        return $this->redirectToRoute('reservation_index');
    }

    // Helpers

    private function createRooms() {
        $room1 = new Room();
        $room1->setType('Presidential Room')
            ->setDescription('Nulla vel metus scelerisque ante sollicitudin. Fusce condimentum nunc ac nisi vulputate fringilla.')
            ->setPersons(2)
            ->setSquareMeters(22);

        $room2 = new Room();
        $room2->setType('Classic Room')
            ->setDescription('Nulla vel metus scelerisque ante sollicitudin. Fusce condimentum nunc ac nisi vulputate fringilla.')
            ->setPersons(2)
            ->setSquareMeters(15);

        $room3 = new Room();
        $room3->setType('Rats Room')
            ->setDescription('Nulla vel metus scelerisque ante sollicitudin. Fusce condimentum nunc ac nisi vulputate fringilla.')
            ->setPersons(2)
            ->setSquareMeters(7);

        $manger = $this->getDoctrine()->getManager();
        $manger->persist($room1);
        $manger->persist($room2);
        $manger->persist($room3);

        $manger->flush();
    }
}