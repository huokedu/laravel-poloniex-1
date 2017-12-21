### Installation

Require this package in your project with `composer require thosuperman/laravel-poloniex`.
Add the service provider to your `config/app.php`:
 
 ``` 
 'providers' => [
     Thosuperman\Poloniex\PoloniexServiceProvider::class,
 ],
 ```
 
...run `php artisan vendor:publish` to copy the config file.
Edit `config/poloniex.php` or add Poloniex api and secret in your `.env` file

```
POLONIEX_KEY={YOUR_API_KEY}
POLONIEX_SECRET={YOUR_API_SECRET}
```

Optionally you can add an alias in your `config/app.php`:

```    
'aliases' => [
    'Poloniex' => Thosuperman\Poloniex\Poloniex::class,
],
```



Usage examples: 
``` 
use Thosuperman\Poloniex\Poloniex;

// Balances

Poloniex::getBalances();
Poloniex::getBalanceFor('BTC');
Poloniex::getFeeInfo();
Poloniex::getDepositAddresses();
Poloniex::transferBalance($currency, $amount, $fromAccount, $toAccount);


// Lending

Poloniex::getActiveLoans();
Poloniex::getTradableBalances();
Poloniex::getOpenLoanOffers();
Poloniex::getLoanOrders('BTC');
Poloniex::getLendingHistory(int $startUnixTimestamp, int $endUnixTimestamp, int $limit=0);

Poloniex::createLoanOffer(($currency, $amount, $duration, $lendingRate, $autoRenew=false));
Poloniex::cancelLoanOffer($orderNumber);
Poloniex::toggleAutoRenewLoan($orderNumber);


// Currency info

Poloniex::getCurrencies();
Poloniex::getVolume();
Poloniex::getVolumeFor('BTC_XMR');
Poloniex::getTickers();
Poloniex::getTicker("BTC_XMR");


// Trade info

Poloniex::getMyTradeHistory('BTC_XMR');
Poloniex::getTradeHistory('BTC_XMR');
Poloniex::getOrderTrades($orderNumber);
Poloniex::getOpenOrders('BTC_XMR');
Poloniex::getOrderBook('BTC_XMR');
Poloniex::getTradingPairs();

Poloniex::buy('BTC_XMR', 0.013, 1, 'postOnly');
Poloniex::sell('BTC_XMR', 0.013, 1, 'postOnly');
Poloniex::cancelOrder('BTC_XMR', 123);
Poloniex::moveOrder($orderNumber, $rate, array $options=[]);
Poloniex::withdraw('BTC', 1, '14PJdqimDkCqWCH1oXy4sVV6nwweqXYDjt');


// Margin account

Poloniex::getMarginAccountSummary();
Poloniex::getMarginPosition('BTC_XMR');

Poloniex::marginBuy($pair, $rate, $amount, $lendingRate=null);
Poloniex::marginSell($pair, $rate, $amount, $lendingRate=null);
Poloniex::closeMarginPosition('BTC_XMR');


// Chart helpers

Poloniex::getValidChartDataTickIntervals();
```
