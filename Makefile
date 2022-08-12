pint:
	vendor\bin\pint

rector:
	vendor\bin\rector

rector-dry:
	vendor\bin\rector --dry-run

rector-help:
	vendor\bin\rector --help

stan:
	vendor\bin\phpstan analyze --configuration phpstan.neon --memory-limit=4G --debug

stan-help:
	vendor\bin\phpstan --help

stan-base:
	vendor\bin\phpstan analyze --configuration phpstan.neon --memory-limit=4G --debug --generate-baseline
