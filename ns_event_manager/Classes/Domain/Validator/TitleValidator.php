<?php
    
    namespace NITSAN\NsEventManager\Domain\Validator ;
    use TYPO3\CMS\Core\Resource\FileReference;
    use TYPO3\CMS\Extbase\Validation\Validator\AbstractValidator;
    use TYPO3\CMS\Core\Resource\FileReference as CoreFileReference;

    final class TitleValidator extends AbstractValidator
    {
        protected function isValid($qq): void
        {
 
            if (str_starts_with( $qq,'_')) {

                $errorString = 'The title may not start with an underscore. ';
                $this->addError($errorString, 1297418976);
                //\TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($this->addError($errorString, 1297418999), __FILE__.' Line No. '.__LINE__);die();
              
            }
          
        
        }
    }

?>