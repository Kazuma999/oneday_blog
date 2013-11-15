<?php
App::uses('TagPost', 'Model');

/**
 * TagPost Test Case
 *
 */
class TagPostTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.tag_post',
		'app.tag',
		'app.post',
		'app.category',
		'app.user',
		'app.comment'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->TagPost = ClassRegistry::init('TagPost');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->TagPost);

		parent::tearDown();
	}

}
