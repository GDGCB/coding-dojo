<?php


class RomanianConverter
{

	private $map = [
		1000 => 'M',
		500 => 'D',
		100 => 'C',
		50 => 'L',
		10 => 'X',
		5 => 'V',
		1 => 'I',
	];

	private $cannotBeSubstracted = ['V', 'L', 'D'];

	public function convertArabicToRoman($number)
	{
		if (empty($number) || ! is_numeric($number)) {
			throw new InvalidArgumentException('number');
		}

		$text = '';
		$prevRoman = '';
		foreach ($this->map as $arabic => $roman){
			$count = (int)floor($number / $arabic);
			$number -= $count * $arabic;

			if ($count >= 4 && !in_array($roman, $this->cannotBeSubstracted)) {
				$number += $count * $arabic;
				continue;

			}

			if ($count >= 4) {
				$text .= $roman . $prevRoman;
				$count = 0;

				return "I" . $prevRoman;
			}

			$text .= str_repeat($roman, $count);
			$prevRoman = $roman;
		}

		return $text;
	}
}
