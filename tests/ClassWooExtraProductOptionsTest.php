<?php

namespace WPSL\WooExtraProductOptions;

use PHPUnit\Framework\TestCase;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Brain\Monkey;
use Brain\Monkey\Actions;
use Brain\Monkey\Filters;
use Brain\Monkey\Functions;
use wpCloud\StatelessMedia\WPStatelessStub;

/**
 * Class ClassWooExtraProductOptionsTest
 */
class ClassWooExtraProductOptionsTest extends TestCase {
  // Adds Mockery expectations to the PHPUnit assertions count.
  use MockeryPHPUnitIntegration;

  public function setUp(): void {
		parent::setUp();
		Monkey\setUp();
  }
	
  public function tearDown(): void {
		Monkey\tearDown();
		parent::tearDown();
	}

  public function testShouldInitHooks() {
    $wooExtraProductOptions = new WooExtraProductOptions();

    $wooExtraProductOptions->module_init([]);

    self::assertNotFalse( has_filter('woocommerce_add_cart_item_data', [ $wooExtraProductOptions, 'add_cart_item_data' ]) );
  }
}
