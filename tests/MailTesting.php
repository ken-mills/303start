<?php
/**
 * Created by PhpStorm.
 * User: Ken
 * Date: 8/25/2016
 * Time: 9:52 AM
 */

 trait MailTesting{

    protected $emails = [];

	/** @before */
	public function setUpMailTesting()
	{

		Mail::getSwiftMailer()
			->registerPlugin(new TestingMailEventListener($this));

	}

	 protected function seeEmailWasSent()
	 {

		 $this->assertNotEmpty(
			 $this->emails, "No emails have been sent"
		 );

		 return $this;

	 }

	 protected function seeEmailTo($recipient, Swift_Message $message = null) {

	 	$this->assertArrayHasKey(
	 		$recipient, $this->getEmail($message)->getTo(),
			"No email was sent to $recipient." );

		 return $this;

	 }

	 protected function seeEmailFrom($sender, Swift_Message $message = null) {


	 	$this->assertArrayHasKey(
	 		$sender, $this->getEmail($message)->getFrom(),
			"Email was not sent from $sender." );

		 return $this;

	 }



	 public function addEmail(Swift_Message $email){

	 	$this->emails[] = $email;
	 }

	 protected function getEmail(Swift_Message $message = null){

	 	$this->seeEmailWasSent();

	 	return $message ?: $this->lastEmail();

	 }

	 protected function lastEmail(){

	 	return end($this->emails);

	 }

 }

class TestingMailEventListener implements Swift_Events_EventListener
{

	 protected $test;

	 public function __construct($test)
	 {
		 $this->test = $test;
	 }

	 public function beforeSendPerformed($event)
	 {
		 $this->test->addEmail($event->getMessage());
	 }


}
