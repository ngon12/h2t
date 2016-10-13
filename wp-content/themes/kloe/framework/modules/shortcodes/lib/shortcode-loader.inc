<?php

namespace KloeQodef\Modules\Shortcodes\Lib;

use KloeQodef\Modules\BlogSlider\BlogSlider;
use KloeQodef\Modules\CallToAction\CallToAction;
use KloeQodef\Modules\Counter\Countdown;
use KloeQodef\Modules\Counter\Counter;
use KloeQodef\Modules\ElementsHolder\ElementsHolder;
use KloeQodef\Modules\ElementsHolderItem\ElementsHolderItem;
use KloeQodef\Modules\GoogleMap\GoogleMap;
use KloeQodef\Modules\ProcessHolder\ProcessHolder;
use KloeQodef\Modules\ProcessItem\ProcessItem;
use KloeQodef\Modules\Separator\Separator;
use KloeQodef\Modules\PieCharts\PieChartBasic\PieChartBasic;
use KloeQodef\Modules\PieCharts\PieChartDoughnut\PieChartDoughnut;
use KloeQodef\Modules\PieCharts\PieChartDoughnut\PieChartPie;
use KloeQodef\Modules\PieCharts\PieChartWithIcon\PieChartWithIcon;
use KloeQodef\Modules\ServiceTable\ServiceTable;
use KloeQodef\Modules\ServiceTables\ServiceTables;
use KloeQodef\Modules\Shortcodes\Icon\Icon;
use KloeQodef\Modules\Shortcodes\ImageGallery\ImageGallery;
use KloeQodef\Modules\Shortcodes\ImageSlider\ImageSlider;
use KloeQodef\Modules\Shortcodes\ShopMasonry\ShopMasonry;
use KloeQodef\Modules\SocialShare\SocialShare;
use KloeQodef\Modules\Team\Team;
use KloeQodef\Modules\InteractiveBanner\InteractiveBanner;
use KloeQodef\Modules\OrderedList\OrderedList;
use KloeQodef\Modules\UnorderedList\UnorderedList;
use KloeQodef\Modules\Message\Message;
use KloeQodef\Modules\ProgressBar\ProgressBar;
use KloeQodef\Modules\IconListItem\IconListItem;
use KloeQodef\Modules\Tabs\Tabs;
use KloeQodef\Modules\Tab\Tab;
use KloeQodef\Modules\PricingTables\PricingTables;
use KloeQodef\Modules\PricingTable\PricingTable;
use KloeQodef\Modules\Accordion\Accordion;
use KloeQodef\Modules\AccordionTab\AccordionTab;
use KloeQodef\Modules\BlogList\BlogList;
use KloeQodef\Modules\Shortcodes\Button\Button;
use KloeQodef\Modules\Blockquote\Blockquote;
use KloeQodef\Modules\CustomFont\CustomFont;
use KloeQodef\Modules\Highlight\Highlight;
use KloeQodef\Modules\VideoButton\VideoButton;
use KloeQodef\Modules\Dropcaps\Dropcaps;
use KloeQodef\Modules\Shortcodes\IconWithText\IconWithText;
use KloeQodef\Modules\FixedBackgroundHolder\FixedBackgroundHolder;
use KloeQodef\Modules\FixedBackgroundItem\FixedBackgroundItem;
use KloeQodef\Modules\Shortcodes\AnimationsHolder\AnimationsHolder;
/**
 * Class ShortcodeLoader
 */
class ShortcodeLoader
{
	/**
	 * @var private instance of current class
	 */
	private static $instance;
	/**
	 * @var array
	 */
	private $loadedShortcodes = array();

	/**
	 * Private constuct because of Singletone
	 */
	private function __construct() {}

	/**
	 * Private sleep because of Singletone
	 */
	private function __wakeup() {}

	/**
	 * Private clone because of Singletone
	 */
	private function __clone() {}

	/**
	 * Returns current instance of class
	 * @return ShortcodeLoader
	 */
	public static function getInstance() {
		if(self::$instance == null) {
			return new self;
		}

		return self::$instance;
	}

	/**
	 * Adds new shortcode. Object that it takes must implement ShortcodeInterface
	 * @param ShortcodeInterface $shortcode
	 */
	private function addShortcode(ShortcodeInterface $shortcode) {
		if(!array_key_exists($shortcode->getBase(), $this->loadedShortcodes)) {
			$this->loadedShortcodes[$shortcode->getBase()] = $shortcode;
		}
	}

	/**
	 * Adds all shortcodes.
	 *
	 * @see ShortcodeLoader::addShortcode()
	 */
	private function addShortcodes() {
		$this->addShortcode(new ElementsHolder());
		$this->addShortcode(new ElementsHolderItem());
		$this->addShortcode(new Team());
		$this->addShortcode(new InteractiveBanner());
		$this->addShortcode(new Icon());
		$this->addShortcode(new CallToAction());
		$this->addShortcode(new OrderedList());
		$this->addShortcode(new UnorderedList());
		$this->addShortcode(new Message());
		$this->addShortcode(new Counter());
		$this->addShortcode(new Countdown());
		$this->addShortcode(new ProgressBar());
		$this->addShortcode(new IconListItem());
		$this->addShortcode(new Tabs());
		$this->addShortcode(new Tab());
		$this->addShortcode(new PricingTables());
		$this->addShortcode(new PricingTable());
		$this->addShortcode(new PieChartBasic());
		$this->addShortcode(new PieChartPie());
		$this->addShortcode(new PieChartDoughnut());
		$this->addShortcode(new PieChartWithIcon());
		$this->addShortcode(new Accordion());
		$this->addShortcode(new AccordionTab());
		$this->addShortcode(new BlogList());
		$this->addShortcode(new Button());
		$this->addShortcode(new Blockquote());
		$this->addShortcode(new CustomFont());
		$this->addShortcode(new Highlight());
		$this->addShortcode(new ImageGallery());
		$this->addShortcode(new GoogleMap());
		$this->addShortcode(new Separator());
		$this->addShortcode(new VideoButton());
		$this->addShortcode(new Dropcaps());
		$this->addShortcode(new IconWithText());
		$this->addShortcode(new SocialShare());
		$this->addShortcode(new ProcessHolder());
		$this->addShortcode(new ProcessItem());
		$this->addShortcode(new ShopMasonry());
		$this->addShortcode(new ServiceTables());
		$this->addShortcode(new ServiceTable());
		$this->addShortcode(new FixedBackgroundHolder());
		$this->addShortcode(new FixedBackgroundItem());
		$this->addShortcode(new ImageSlider());
		$this->addShortcode(new BlogSlider());
		$this->addShortcode(new AnimationsHolder());
	}
	/**
	 * Calls ShortcodeLoader::addShortcodes and than loops through added shortcodes and calls render method
	 * of each shortcode object
	 */
	public function load() {
		$this->addShortcodes();

		foreach ($this->loadedShortcodes as $shortcode) {
			add_shortcode($shortcode->getBase(), array($shortcode, 'render'));
		}

	}
}

$shortcodeLoader = ShortcodeLoader::getInstance();
$shortcodeLoader->load();