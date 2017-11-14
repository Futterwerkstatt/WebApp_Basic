<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * WebConfig
 *
 * @ORM\Table(name="web_config")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\WebConfigRepository")
 */
class WebConfig {

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="updated_at", type="datetime")
     */
    private $updatedAt;

    /**
     * @var string
     *
     * @ORM\Column(name="website_name", type="string", length=255)
     */
    private $websiteName;

    /**
     * @var string
     *
     * @ORM\Column(name="website_description", type="string", length=255, nullable=true)
     */
    private $websiteDescription;

    /**
     * @var bool
     *
     * @ORM\Column(name="bootstrap_enable", type="boolean")
     */
    private $bootstrapEnable;

    /**
     * @var string
     *
     * @ORM\Column(name="bootstrap_theme", type="string", length=255)
     */
    private $bootstrapTheme;

    /**
     * @var string
     *
     * @ORM\Column(name="fa_enable", type="boolean")
     */
    private $fontAwesomeEnable;

    /**
     * @var array
     */
    private $CDN = [
        'css' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css',
        'js' => 'https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js',
        'jquery' => 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js',
        'theme' => [
            'Cerulean' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/cerulean/bootstrap.min.css',
            'Cosmo' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/cosmo/bootstrap.min.css',
            'Cyborg' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/cyborg/bootstrap.min.css',
            'Darkly' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/darkly/bootstrap.min.css',
            'Flatly' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/flatly/bootstrap.min.css',
            'Journal' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/journal/bootstrap.min.css',
            'Lumen' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/lumen/bootstrap.min.css',
            'Paper' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/paper/bootstrap.min.css',
            'Readable' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/readable/bootstrap.min.css',
            'Sandstone' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/sandstone/bootstrap.min.css',
            'Simplex' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/simplex/bootstrap.min.css',
            'Slate' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/slate/bootstrap.min.css',
            'Spacelab' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/spacelab/bootstrap.min.css',
            'Superhero' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/superhero/bootstrap.min.css',
            'United' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/united/bootstrap.min.css',
            'Yeti' => 'https://maxcdn.bootstrapcdn.com/bootswatch/3.3.6/yeti/bootstrap.min.css',
        ],
        'fa' => 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.3/css/font-awesome.min.css'
    ];

    /**
     * Constructor
     */
    public function __construct() {
        $this->updatedAt = new \DateTime;
        $this->bootstrapEnable = true;
        $this->fontAwesome = true;
        $this->bootstrapTheme = $this->$CDN['theme'][0];
    }

    /**
     * Get Bootstrap Base CSS
     *
     * @return string
     */
    public function getbootstrapCSS() {
        return $this->CDN['css'];
    }

    /**
     * Get Bootstrap Base JS
     *
     * @return string
     */
    public function getbootstrapJS() {
        return $this->CDN['js'];
    }

    /**
     * Get Bootstrap Themes
     *
     * @return array
     */
    public function getThemeConfig() {
        return $this->CDN['theme'];
    }

    /**
     * Get Jquery Base JS
     *
     * @return string
     */
    public function getjQuery() {
        return $this->CDN['jquery'];
    }

    /**
     * Get Font Awesome
     *
     * @return string
     */
    public function getfontAwesomeCSS() {
        return $this->CDN['fa'];
    }

    // end custom methods
  

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
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return WebConfig
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Set websiteName
     *
     * @param string $websiteName
     *
     * @return WebConfig
     */
    public function setWebsiteName($websiteName)
    {
        $this->websiteName = $websiteName;

        return $this;
    }

    /**
     * Get websiteName
     *
     * @return string
     */
    public function getWebsiteName()
    {
        return $this->websiteName;
    }

    /**
     * Set websiteDescription
     *
     * @param string $websiteDescription
     *
     * @return WebConfig
     */
    public function setWebsiteDescription($websiteDescription)
    {
        $this->websiteDescription = $websiteDescription;

        return $this;
    }

    /**
     * Get websiteDescription
     *
     * @return string
     */
    public function getWebsiteDescription()
    {
        return $this->websiteDescription;
    }

    /**
     * Set bootstrapEnable
     *
     * @param boolean $bootstrapEnable
     *
     * @return WebConfig
     */
    public function setBootstrapEnable($bootstrapEnable)
    {
        $this->bootstrapEnable = $bootstrapEnable;

        return $this;
    }

    /**
     * Get bootstrapEnable
     *
     * @return boolean
     */
    public function getBootstrapEnable()
    {
        return $this->bootstrapEnable;
    }

    /**
     * Set bootstrapTheme
     *
     * @param string $bootstrapTheme
     *
     * @return WebConfig
     */
    public function setBootstrapTheme($bootstrapTheme)
    {
        $this->bootstrapTheme = $bootstrapTheme;

        return $this;
    }

    /**
     * Get bootstrapTheme
     *
     * @return string
     */
    public function getBootstrapTheme()
    {
        return $this->bootstrapTheme;
    }

    /**
     * Set fontAwesomeEnable
     *
     * @param boolean $fontAwesomeEnable
     *
     * @return WebConfig
     */
    public function setFontAwesomeEnable($fontAwesomeEnable)
    {
        $this->fontAwesomeEnable = $fontAwesomeEnable;

        return $this;
    }

    /**
     * Get fontAwesomeEnable
     *
     * @return boolean
     */
    public function getFontAwesomeEnable()
    {
        return $this->fontAwesomeEnable;
    }
}
