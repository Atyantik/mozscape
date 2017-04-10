<?php
namespace Atyantik\Mozscape\Services;
use Atyantik\Mozscape\Authentication\Authenticator;

/**
 * abstract class for Services
 *
 * @package Service
 * @author SEOmoz
 */
abstract class AbstractService {

	private $authenticator;

	public function __construct(Authenticator $authenticator) {
		$this->authenticator = $authenticator;
	}

	/**
	 * @return the $authenticator
	 */
	public function getAuthenticator() {
		return $this->authenticator;
	}

	/**
	 * @param $authenticator the $authenticator to set
	 */
	public function setAuthenticator($authenticator) {
		$this->authenticator = $authenticator;
	}

}
?>