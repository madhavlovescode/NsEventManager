<?php

    namespace NITSAN\NsEventManager\Domain\Validator;
    use TYPO3\CMS\Core\Resource\FileReference;
    use TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator;
    use TYPO3\CMS\Core\Resource\FileReference as CoreFileReference;

    final class ModeValidator extends AbstractValidator
    {
        protected function isValid($qq): void
        {
 $dd= trim(strtolower($qq));
 
            if ($dd != 'online' && $dd != 'hybrid' && $dd != 'offline') {
//\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($dd, __FILE__.' Line No. '.__LINE__);die();
                $errorString = 'Enter valid Mode.(online,offline,hybrid)';
                $this->addError($errorString, 1297418977);
              
            }
          //    \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($dd, __FILE__.' Line No. '.__LINE__);die();
        
        }
    }

?>