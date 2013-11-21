<?php

namespace Instaphp\Instagram;
include_once 'InstagramTest.php';
/**
 * Generated by PHPUnit_SkeletonGenerator 1.2.0 on 2013-01-23 at 06:41:30.
 * @ignore
 */
class MediaTest extends InstagramTest
{

	/**
	 * @var Media
	 */
	protected $object;
	
	protected $lat = '37.78776';
	
	protected $lng = '-122.489556';
	
	static $comment_id = NULL;
	
	/**
	 * Sets up the fixture, for example, opens a network connection.
	 * This method is called before a test is executed.
	 */
	protected function setUp()
	{
		$this->object = new Media($this->config);
	}

	/**
	 * Tears down the fixture, for example, closes a network connection.
	 * This method is called after a test is executed.
	 */
	protected function tearDown()
	{
		
	}

	/**
	 * @covers Instaphp\Instagram\Media::Popular
	 */
	public function testPopular()
	{
		$res = $this->object->Popular(['count' => 5]);
		$this->assertInstanceOf('\Instaphp\Instagram\Response', $res);
		$this->assertEquals(200, $res->meta['code']);
		$this->assertNotEmpty($res->data);
		$this->assertEquals(5, count($res->data));
		$this->assertEquals(5000, $res->limit);
		$this->assertLessThan($res->limit, $res->remaining);
	}

	/**
	 * @covers Instaphp\Instagram\Media::Info
	 */
	public function testInfo()
	{
		$res = $this->object->Info(TEST_MEDIA_ID);
		$this->assertInstanceOf('\Instaphp\Instagram\Response', $res);
		$this->assertEquals(200, $res->meta['code']);
		$this->assertNotEmpty($res->data);
	}

	/**
	 * @covers Instaphp\Instagram\Media::Search
	 */
	public function testSearch()
	{
		$res = $this->object->Search(['count' => 10, 'distance' => 5000, 'lat' => $this->lat, 'lng' => $this->lng]);
		$this->assertInstanceOf('\Instaphp\Instagram\Response', $res);
		$this->assertEquals(200, $res->meta['code']);
		if ($res->meta['code'] == 200)
			$this->assertNotEmpty($res->meta);
	}

	/**
	 * @covers Instaphp\Instagram\Media::Like
	 */
	public function testLike()
	{
		$this->object->SetAccessToken(TEST_ACCESS_TOKEN);
		$res = $this->object->Like(TEST_MEDIA_ID);
		$this->assertInstanceOf('\Instaphp\Instagram\Response', $res);
		$this->assertEquals(200, $res->meta['code']);
		$info = $this->object->Info(TEST_MEDIA_ID);
		$this->assertTrue($info->data['user_has_liked']);
	}

	/**
	 * @covers Instaphp\Instagram\Media::Likes
	 */
	public function testLikes()
	{
		$res = $this->object->Likes(TEST_MEDIA_ID);
		$this->assertInstanceOf('\Instaphp\Instagram\Response', $res);
		$this->assertEquals(200, $res->meta['code']);
	}

	/**
	 * @covers Instaphp\Instagram\Media::Unlike
	 */
	public function testUnlike()
	{
		$this->object->SetAccessToken(TEST_ACCESS_TOKEN);
		$res = $this->object->Unlike(TEST_MEDIA_ID);
		$this->assertInstanceOf('\Instaphp\Instagram\Response', $res);
		$this->assertEquals(200, $res->meta['code']);
		$info = $this->object->Info(TEST_MEDIA_ID);
		$this->assertFalse($info->data['user_has_liked']);
	}

	/**
	 * @covers Instaphp\Instagram\Media::Comment
	 */
	public function testComment()
	{
		$this->object->SetAccessToken(TEST_ACCESS_TOKEN);
		$res = $this->object->Comment(TEST_MEDIA_ID, 'Test comment');
		$this->assertInstanceOf('\Instaphp\Instagram\Response', $res);
		$this->assertEquals(200, $res->meta['code']);
		$this->assertNotEmpty($res->data);
		$this->assertNotEmpty($res->data['id']);
		static::$comment_id = $res->data['id'];
				
	}

	/**
	 * @covers Instaphp\Instagram\Media::Comments
	 */
	public function testComments()
	{
		$res = $this->object->Comments(TEST_MEDIA_ID);
		$this->assertInstanceOf('\Instaphp\Instagram\Response', $res);
		$this->assertEquals(200, $res->meta['code']);
		$this->assertGreaterThan(0, count($res->data));
	}

	/**
	 * @covers Instaphp\Instagram\Media::Uncomment
	 */
	public function testUncomment()
	{
		$this->object->SetAccessToken(TEST_ACCESS_TOKEN);
		$res = $this->object->Uncomment(TEST_MEDIA_ID, static::$comment_id);
		$this->assertInstanceOf('\Instaphp\Instagram\Response', $res);
		$this->assertEquals(200, $res->meta['code']);
		
	}

}
