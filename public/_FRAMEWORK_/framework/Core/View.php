<?php

namespace Framework\Core;

class View
{
	public function render(string $template, array $params = []){
		$template_path = ABS_PATH . 'app/Views/' . $template . '.php';

		if( !is_file($template_path) ){
			throw new \InvalidArgumentException(
				sprintf('Template "%s" not found in "%s"', $template, $template_path)
			);
		}

		extract($params);

		ob_start();
		ob_implicit_flush(0);

		try {

			require $template_path;

		} catch (\Exception $e) {

			ob_end_clean();
			throw $e;

		}

		$view = ob_get_clean();

		echo $view;
	}
}