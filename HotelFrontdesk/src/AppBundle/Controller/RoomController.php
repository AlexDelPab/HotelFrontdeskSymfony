<?php

namespace AppBundle\Controller;

use AppBundle\Entity\Room;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/room")
 */
class RoomController extends BaseController {

    /**
     * @Route("/index", name="room_index")
     */
    public function indexAction() {
        $roomRepository = $this->getDoctrine()->getRepository(Room::class);

        $rooms = $roomRepository->findAll();
        
        if (!$rooms) {
            $rooms = $this->createRooms();
        }

        return $this->render('@App/rooms.html.twig', [
            'rooms' => $rooms,
        ]);
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
