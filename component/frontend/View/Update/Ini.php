<?php
/**
 * @package   AkeebaReleaseSystem
 * @copyright Copyright (c)2010 Nicholas K. Dionysopoulos
 * @license   GNU General Public License version 3, or later
 */

namespace Akeeba\ReleaseSystem\Site\View\Update;

defined('_JEXEC') or die;

use Akeeba\ReleaseSystem\Admin\Model\Environments;
use FOF30\View\DataView\Raw;

class Ini extends Raw
{
	public $items = array();

	protected function onBeforeIni($tpl = null)
	{
		$this->setLayout('ini');

		/** @var Environments $envmodel */
		$envmodel = $this->container->factory->model('Environments')->tmpInstance();
		$rawenvs  = $envmodel->get(true);
		$envs     = array();

		if ($rawenvs->count())
		{
			foreach ($rawenvs as $env)
			{
				$envs[ $env->id ] = $env;
			}
		}

		$this->envs  = $envs;

		// Set the content type to text/plain
		$document = \JFactory::getDocument();
		$document->setMimeEncoding('text/plain');

        // Set the content type to text/plain
        @header('Content-type: text/plain');
	}
}