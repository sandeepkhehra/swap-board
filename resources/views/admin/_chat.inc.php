<?php
use SwapBoard\Controllers\Admin\ChatsController;
use SwapBoard\Controllers\UsersController;
$chatsController = new ChatsController;

?>
<div class="show-div hidden" id="private-messages">
	<div class="find-offer archive">
		<h2>Private Messages</h2>

		<?php if ( ! empty( $chats ) ): ?>

		<div class="wrapper-chat">
			<div class="container-left">
				<div class="left">
					<ul class="people">
						<?php
						foreach ( $chats as $chat ) :
							if ( $chat->clientID == $user_ID ) :
								$clientData = get_userdata( $chat->userID );
								$toChatID = $chat->userID;
							else:
								$clientData = get_userdata( $chat->clientID );
								$toChatID = $chat->clientID;
							endif;
						?>
						<li class="person" data-swap-chat="<?php echo $chat->id; ?>" data-client-id="<?php echo $toChatID; ?>">
							<img src="<?php echo ( new UsersController )->getUserMeta( $chat->clientID )['avatar']; ?>" alt="user">
							<span class="name"><?php echo $clientData->display_name; ?></span>

							<?php
							$unreadCount = $chatsController->unreadChats( $chat->id, $toChatID );
							if ( $unreadCount > 0 ) : ?>
								<span class="time"><?php echo $unreadCount; ?></span>
							<?php endif; ?>

							<span class="preview"></span>
						</li>
						<?php endforeach; ?>
					</ul>
				</div>
				<div class="right">
					<div class="chat active-chat" data-chat-space>
						<div class="conversation-start"><span></span></div>
						<div class="flex" style="height: 100%; justify-content: flex-end; flex-direction: column"></div>
					</div>

					<div class="write" data-chat-option>
						<form class="flex flex-jc-sb flex-ai-center padding--20l padding--20r">
							<?php sboardDefineFormAction('ajax', 'sendChat', SwapBoard\Controllers\Admin\ChatMessagesController::class); ?>
							<input type="text" name="content" placeholder="Type your message here...">
							<input type="hidden" name="userID" value="<?php echo $user_ID; ?>">
							<input type="hidden" name="chatID" value="">
							<span data-swap-button="send-chat" title="Send message"><i class="fa fa-paper-plane" aria-hidden="true"></i>
						</span>
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php else: ?>
		<p>No chats found! Go to your <a href="#member-list" class="tbntabs">Members List</a> to chat with someone!</p>
		<?php endif; ?>
	</div>

	<div id="paypal-button"></div>
<script src="https://www.paypalobjects.com/api/checkout.js"></script>
<script>
  paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
    //   sandbox: 'demo_sandbox_client_id',
    //   sandbox: 'Johnsemail89-facilitator_api1.gmail.com',
      sandbox: 'AcMOZGEoWmg83yQIf2MufsSKs-gdvOdnQWtCUZP1Td9imokH5bysoL4a5SXpm3UeKLNDJ1P0aW3hxLzL',
      production: 'As-zikyfmLySOA4c70aSRCZQkJuqA.fwELw1z2TtR3W-ebC.E8uLJeYA'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
      size: 'large',
      color: 'black',
      shape: 'rect',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,

    // Set up a payment
    payment: function(data, actions) {
      return actions.payment.create({
        transactions: [{
          amount: {
            total: '0.01',
            currency: 'USD'
          }
        }]
      });
    },
    // Execute the payment
    onAuthorize: function(data, actions) {
      return actions.payment.execute().then(function() {
        // Show a confirmation message to the buyer
        window.alert('Thank you for your purchase!');
      });
    }
  }, '#paypal-button');

</script>
</div>
