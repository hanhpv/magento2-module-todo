<?php
namespace Hans\Todo\Controller\Adminhtml\Index;

class Save extends \Magento\Backend\App\Action
{
    /**
     * Save action
     *
     * @return \Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        // check if data sent
        $data = $this->getRequest()->getPostValue();
        if ($data) {
            $id = $this->getRequest()->getParam('todo');
            $model = $this->_objectManager->create('Hans\Todo\Model\Todo')->load($id);
            if (!$model->getId() && $id) {
                $this->messageManager->addErrorMessage(__('This todo no longer exists.'));
                return $resultRedirect->setPath('*/*/');
            }

            // init model and set data
            $model->setData($data);
            if (isset($data['completed']) && $data['completed']) {
                $model->setCompleted(1);
            }

            // try to save it
            try {
                // save the data
                $model->save();
                // display success message
                $this->messageManager->addSuccessMessage(__('You saved the todo.'));
                // clear previously saved data from session
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData(false);

                // check if 'Save and Continue'
                if ($this->getRequest()->getParam('back')) {
                    return $resultRedirect->setPath('*/*/edit', ['todo_id' => $model->getId()]);
                }
                // go to grid
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                // display error message
                $this->messageManager->addErrorMessage($e->getMessage());
                // save data in session
                $this->_objectManager->get('Magento\Backend\Model\Session')->setFormData($data);
                // redirect to edit form
                return $resultRedirect->setPath('*/*/edit', ['todo_id' => $this->getRequest()->getParam('todo_id')]);
            }
        }
        return $resultRedirect->setPath('*/*/');
    }
}
