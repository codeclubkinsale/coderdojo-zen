<?php

function cdzen_register_terms() {
    
    /*
    * Taxonomy: Badge Type.
    */
    $result = wp_insert_term(
    	'Programming Badges',  
    	'badge_type', 
        array(
            'description' => 'Here you will find a variety of tutorials and projects created by the CoderDojo Community!',
            'slug'        => 'programming'
        )
    );

    if(!is_wp_error( $result )) {

        wp_insert_term(
            'Scratch',  
            'badge_type', 
            array(
                'description' => 'Scratch is a free programming language where you can create your own interactive stories, games and animations.',
                'parent'      => $result["term_id"],
                'slug'        => 'scratch'
            )
        );

        wp_insert_term(
            'HTML',  
            'badge_type', 
            array(
                'description' => 'HTML (Hypertext Markup Language) and CSS (Cascading Style Sheets) are two if the core technologies for building Web Pages.',
                'parent'      => $result["term_id"],
                'slug'        => 'html'
            )
        );

        wp_insert_term(
            'JavaScript',  
            'badge_type', 
            array(
                'description' => 'JavaScript is a full-fledged programming language that can provide dynamic interactivity on websites.',
                'parent'      => $result["term_id"],
                'slug'        => 'javascript'
            )
        );

        wp_insert_term(
            'Python',  
            'badge_type', 
            array(
                'description' => 'Python is a widely used high-level programming language used for general-purpose programming.',
                'parent'      => $result["term_id"],
                'slug'        => 'python'
            )
        );

        wp_insert_term(
            'App Inventor',  
            'badge_type', 
            array(
                'description' => 'Mobile is a term used to denote the act or process by which application software is developed for mobile.',
                'parent'      => $result["term_id"],
                'slug'        => 'app-inventor'
            )
        );
    }
    
    $result = wp_insert_term(
    	'Soft Skills Badges',  
    	'badge_type', 
        array(
            'description' => 'Robots, Arduinos, Raspberry Pis and 3D printing!',
            'slug'        => 'soft-skills'
        )
    );

    if(!is_wp_error( $result )) {

        wp_insert_term(
            'Champion',  
            'badge_type', 
            array(
                'description' => 'Learn hardware and programming with Raspberry Pi!',
                'parent'      => $result["term_id"],
                'slug'        => 'champion'
            )
        );

        wp_insert_term(
            'Mentor',  
            'badge_type', 
            array(
                'description' => 'Arduino is an open-source electronics prototyping platform based on flexible, easy-to-use hardware and software. It’s intended for artists, designers, hobbyists, and anyone interested in creating interactive objects or environments.',
                'parent'      => $result["term_id"],
                'slug'        => 'mentor'
            )
        );

        wp_insert_term(
            'Volunteer',  
            'badge_type', 
            array(
                'description' => 'Learn to code and build hardware projects with the BBC micro:bit.',
                'parent'      => $result["term_id"],
                'slug'        => 'volunteer'
            )
        );

    }

    $result = wp_insert_term(
    	'Event Badges',  
    	'badge_type', 
        array(
            'description' => 'Audio, image and video editing tools!',
            'slug'        => 'events'
        )
    );

    if(!is_wp_error( $result )) {

        wp_insert_term(
            'Community Event',  
            'badge_type', 
            array(
                'description' => 'Find the tools you need to get started with audio editing.',
                'parent'      => $result["term_id"],
                'slug'        => 'community-event'
            )
        );

        wp_insert_term(
            'Dojo Attendance',  
            'badge_type', 
            array(
                'description' => 'Want to get creative with videos? Here you will find a list of the tools to get you started.',
                'parent'      => $result["term_id"],
                'slug'        => 'dojo-attendance'
            )
        );
    }

	/*
* Taxonomy: Resource Types.
*/
	wp_insert_term(
		'Mentor',
		'ticket_types',
		array(
			'description' => 'This content is reviewed by the CoderDojo Foundation and is the recommended starting point for a Dojo or Ninja that’s just beginning to address the topic.',
			'slug'        => 'mentor'
		)
	);

	wp_insert_term(
		'Other',
		'types',
		array(
			'description' => 'Ninjas who have completed the core resources at a specific level and want to learn more related things, without going deeper into the topic yet.',
			'slug'        => 'other'
		)
	);

	wp_insert_term(
		'Parent/Guardian',
		'types',
		array(
			'description' => 'Learn to build apps and games to help people learn about important issues.',
			'slug'        => 'parent-guardian'
		)
	);

	wp_insert_term(
		'Youth',
		'types',
		array(
			'description' => 'Ideas for Ninjas or Dojos for more projects they can undertake with the skills they have learned.',
			'slug'        => 'youth'
		)
	);

}
add_action( 'init', 'cdzen_register_terms' );


