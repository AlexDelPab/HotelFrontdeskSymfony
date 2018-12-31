<?php

namespace AppBundle\Constants;

class Constants {

    /**
     * Room types
     */
    const ROOM_CLASSIC = "classic";
    const ROOM_DELUXE = "deluxe";
    const ROOM_PRESIDENT = "president";

    /**
     * Boolean
     */
    const TRUE = 1;
    const FALSE = 0;
    const NULL = -1;

    /**
     * Reservation Status
     */
    const STATUS_OPEN = "open";
    const STATUS_CHECKD_IN = "check_in";
    const STATUS_CHECK_OUT = "checked_out";
}