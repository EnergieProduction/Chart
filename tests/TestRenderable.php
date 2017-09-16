<?php

use EnergieProduction\Chart\Renderable;

class TestRenderable extends \PHPUnit\Framework\TestCase
{
    public function testBasicRender()
    {
        $render = new Renderable\Render;

        $result = $render->handle('test_key', 'test_content');

        $this->assertArraySubset(['test_key' => 'test_content'], $result);
    }

    public function testRenderCriteria()
    {
        $render = new Renderable\Render;

        $render = new Renderable\Criteria($render);

        $result = $render->handle('test_key', 'test_content');

        $this->assertArraySubset(['test_key' => 'test_content'], $result);        
    }

    public function testRenderExpression()
    {
        $render = new Renderable\Render;

        $render = new Renderable\Expression($render);

        $result = $render->handle('test_key', 'test_content');

        $this->assertArraySubset(['test_key' => '#!!test_content!!#'], $result);        
    }

    public function testRenderCriteriaWithExpression()
    {
        $render = new Renderable\Render;

        $render = new Renderable\Criteria($render);

        $render = new Renderable\Expression($render);

        $result = $render->handle('test_key', 'test_content');

        $this->assertArraySubset(['test_key' => '#!!test_content!!#'], $result);        
    }

    public function testRenderSubset()
    {
        $render = new Renderable\Render;

        $render = new Renderable\Subset($render);

        $result = $render->handle('test_key', 'test_content');

        $this->assertArraySubset(['test_key' => 'test_content'], $result);        
    }

    public function testRenderSubsetWhitDotNotation()
    {
        $render = new Renderable\Render;

        $render = new Renderable\Subset($render);

        $result = $render->handle('test.key', 'test_content');

        $this->assertArraySubset(['test' => ['key' => 'test_content']], $result);
    }

    public function testRenderSubsetExpressionWhitDotNotation()
    {
        $render = new Renderable\Render;

        $render = new Renderable\Subset($render);

        $render = new Renderable\Expression($render);

        $result = $render->handle('test.key', 'test_content');

        $this->assertArraySubset(['test' => ['key' => '#!!test_content!!#']], $result);
    }    
}
