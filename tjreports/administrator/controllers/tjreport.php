<?php
/**
 * @package     Joomla.site
 * @subpackage  com_tjreports
 *
 * @copyright   Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access to this file
defined('_JEXEC') or die;

jimport('joomla.application.component.controllerform');
/**
 * tjreport Controller
 *
 * @package     Joomla.Administrator
 * @subpackage  com_tjreports
 * @since       0.0.1
 */
class TjreportsControllerTjreport extends JControllerForm
{
	/**
	 * Contructor
	 */

	public function __construct()
	{
		$this->view_list = 'tjreports';
		parent::__construct();
	}

	/**
	 * Function to get all the respective plugins for given client
	 *
	 * @return  object  object
	 */
	public function getplugins()
	{
		$model = $this->getModel('tjreport');
		$result = $model->getplugins();
	}

	/**
	 * Function to get all the respective plugins for given client
	 *
	 * @return  object  object
	 */

	public function getparams()
	{
		$model = $this->getModel('tjreport');
		$result = $model->getparams();
	}

	/**
	 * Gets the URL arguments to append to an item redirect.
	 *
	 * @param   integer  $recordId  The primary key id for the item.
	 * @param   string   $urlVar    The name of the URL variable for the id.
	 *
	 * @return  string  The arguments to append to the redirect URL.
	 *
	 * @since   1.6
	 */
	protected function getRedirectToItemAppend($recordId = null, $urlVar = 'id')
	{
		$extension = JFactory::getApplication()->input->get('extension', '', 'word');
		$append = parent::getRedirectToItemAppend($recordId);

		if ($extension)
		{
			$append .= '&extension=' . $extension;
		}

		return $append;
	}

	/**
	 * Function to cancel the operation on field
	 *
	 * @param   string  $key  key
	 *
	 * @return  void
	 */
	public function cancel($key = null)
	{
		$extension = JFactory::getApplication()->input->get('extension', '', 'word');

		if ($extension)
		{
			$link = JRoute::_('index.php?option=com_tjreports&view=tjreports&extension=' . $extension, false);
		}
		else
		{
			$link = JRoute::_('index.php?option=com_tjreports&view=tjreports', false);
		}

		$this->setRedirect($link);
	}
}
