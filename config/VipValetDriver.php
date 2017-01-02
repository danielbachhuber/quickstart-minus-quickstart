<?php

class VipValetDriver extends BasicValetDriver
{
    /**
     * Determine if the driver serves the request.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return bool
     */
    public function serves($sitePath, $siteName, $uri)
    {
        return is_dir( $sitePath . '/wp/wp-admin' );
    }

    /**
     * Get the fully resolved path to the application's front controller.
     *
     * @param  string  $sitePath
     * @param  string  $siteName
     * @param  string  $uri
     * @return string
     */
    public function frontControllerPath($sitePath, $siteName, $uri)
    {

        $_SERVER['PHP_SELF']    = $uri;
        $_SERVER['SERVER_ADDR'] = '127.0.0.1';
        $_SERVER['SERVER_NAME'] = $_SERVER['HTTP_HOST'];

        $matched = false;
        foreach( array( 'wp-admin', 'wp-includes', 'wp-login' ) as $path ) {
            if ( false !== ( $pos = stripos( $uri, '/' . $path ) ) ) {
                $uri = '/wp' . substr( $uri, $pos );
            }
        }

        return parent::frontControllerPath(
            $sitePath, $siteName, $this->forceTrailingSlash($uri)
        );
    }

    public function isStaticFile($sitePath, $siteName, $uri)
    {
        foreach( array( 'wp-admin', 'wp-includes' ) as $path ) {
            if ( false !== ( $pos = stripos( $uri, '/' . $path ) ) ) {
                $new_uri = '/wp' . substr( $uri, $pos );
                if ( file_exists( $sitePath . $new_uri ) ) {
                    return $sitePath . $new_uri;
                }
            }
        }
        return parent::isStaticFile( $sitePath, $siteName, $uri );
    }

    /**
     * Redirect to uri with trailing slash.
     *
     * @param  string $uri
     * @return string
     */
    private function forceTrailingSlash($uri)
    {
        if (substr($uri, -1 * strlen('/wp-admin')) == '/wp-admin') {
            header('Location: '.$uri.'/'); die;
        }

        return $uri;
    }
}
