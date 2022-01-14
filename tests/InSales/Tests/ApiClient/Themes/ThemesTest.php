<?php

namespace InSales\Tests\ApiClient\Themes;

use InSales\API\ApiResponse;
use InSales\TestCase;

class ThemesTest extends TestCase
{
	public function testTest()
	{
		$methods = [200, 201];
		$client = $this->getApiClient(true);

		/** @var ApiResponse $response */
		$response = $client->listThemes();
		$this->assertTrue(in_array($response->getHttpCode(), $methods));

		$theme_id = $response->getData()[0]['id'];

		$response = $client->listAssets($theme_id);
		$this->assertTrue(in_array($response->getHttpCode(), $methods));
		$response = $client->uploadAsset(
			$theme_id,
			[
				'asset' => [
                    'name' => 'test.liquid',
                    'content' => '{% help %}',
                    'type' => 'Asset::Snippet',
                ]
			]
		);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));

        $id = $response->getData()['id'];
        $response = $client->getAsset($theme_id, $id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->updateAsset(
            $theme_id,
            $id,
            [
                'asset' => [
                    'content' => 'Amazing template for page {{product.title}}',
                ]
            ]
        );
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->renameAsset(
            $theme_id,
            $id,
            [
                'asset' => [
                    'new_name' => 'test1.liquid',
                ]
            ]
        );
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
        $response = $client->removeAsset($theme_id, $id);
        $this->assertTrue(in_array($response->getHttpCode(), $methods));
	}
}