<?php


class Camera
{

	public static verbose;


	public function __construct(array $kwargs)
	{
		//test
		$this->test($kwargs);
	


		if (verbose)
		{
			echo "je construct";
		}
	}

	public function __destruct()
	{
		if (verbose)
		{
			echo "je destruct";
		}
	}

	public function __toString()
	{
		return "to string";
	}

	public static function doc()
	{
		echo "je suis la doc";
	}
	public function watchVertex(Vertex $worldVertex)
	{

	}

	private function test($kwargs)
	{
		if (unset($kwargs))
		{
			echo "error";
			exit();
		}
		if (unset($keargs['preset'])   ||
			unset($keargs['angle'])   ||
			unset($keargs['origin'])   ||
			unset($keargs['orientation'])   ||
			unset($keargs['width'])   ||
			unset($keargs['height'])   ||
			unset($keargs['fov'])   ||
			unset($keargs['near'])   ||
			unset($keargs['far'])  )
		{
			echo "error";
			exit();
		}
	}
}

?>
