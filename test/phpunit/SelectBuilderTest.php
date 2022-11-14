<?php
namespace Gt\SqlBuilder\Test;

use Gt\SqlBuilder\SelectBuilder;

class SelectBuilderTest extends QueryTestCase {
	public function testSelect():void {
		$sut = new SelectBuilder();
		$sut->select("'test'");
		self::assertSame("select 'test'", self::normalise($sut));
	}

	public function testFrom():void {
		$sut = new SelectBuilder();
		$sut->select("testColumn")
			->from("testTable");
		self::assertSame("select testColumn from testTable", self::normalise($sut));
	}

	public function testInnerJoin():void {
		$sut = new SelectBuilder();
		$sut->select("testColumn")
			->from("testTable")
			->innerJoin("otherTable");
		self::assertSame(
			"select testColumn from testTable inner join otherTable",
			self::normalise($sut),
		);
	}
}
