<?php
namespace Register\UserBundle\Entity;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * User
 * @ORM\HasLifecycleCallbacks
 * @ORM\Table()
 * @ORM\Entity
 */

class User extends BaseUser
{
    /**
             * @ORM\Id
             * @ORM\Column(type="integer")
             * @ORM\GeneratedValue(strategy="AUTO")
             */
            protected $id;
  /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description;
        
/**
     * @var string $image
     * @ORM\Column(name="image", type="string", length=255)
     */
    private $image;
    
    
     public $file;



     ///////////////////////////////////////

  protected function getUploadDir()
    {
        return 'image';
    }
     
    protected function getUploadRootDir()
    {
        return __DIR__.'/../../../../web/'.$this->getUploadDir()."/".$this->getId()."/";
    }
     
    public function getWebPath()
    {
        return null === $this->image ? null : $this->getUploadDir().$this->getId()."/".'/'.$this->image;
    }
     

    public function getAbsolutePath()
    {
        return null === $this->image ? null : $this->getUploadRootDir().$this->getId()."/".'/'.$this->image;
    }

    

     //////////////////////////////////////////////////

 /**
     * @ORM\PrePersist
     * @ORM\PreUpdate
     */
    public function preUpload()
    {
         if (null !== $this->file) {
            // do whatever you want to generate a unique name
            $this->image = uniqid().'.'.$this->file->guessExtension();
          }
    }

    /**
     * @ORM\PostPersist
     * @ORM\PostUpdate
     */
    public function upload()
    {
         if (null === $this->file) {
            return;
          }
         
          // if there is an error when moving the file, an exception will
          // be automatically thrown by move(). This will properly prevent
          // the entity from being persisted to the database on error
          $this->file->move($this->getUploadRootDir(), $this->image);
         
          unset($this->file);
    }

    
///////////////////////////////////////

/**
     * @ORM\PreRemove()
     */
    public function storeFilenameForRemove()
    {
        $this->filenameForRemove = $this->getAbsolutePath1();
    }

    /**
     * @ORM\PostRemove()
     */
    public function removeUpload()
    {
        if ($this->filenameForRemove) {
            unlink($this->filenameForRemove);
        }
    }

  


   

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set description
     *
     * @param string $description
     * @return User
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set image
     *
     * @param string $image
     * @return User
     */
    public function setImage($image)
    {
        $this->image = $image;

        return $this;
    }

    /**
     * Get image
     *
     * @return string 
     */
    public function getImage()
    {
        return $this->image;
    }
}
