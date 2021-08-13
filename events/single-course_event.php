<?php
namespace Events;

final class Single_Course_Event {
    private static $_instance = null;

	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

    public function __construct(){
        get_single_course_event();
    }

    public function get_single_course_event(){
        echo "new Hello";
    }
}

Single_Course_Event::instance();