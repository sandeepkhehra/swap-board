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
						<div class="conversation-holder" style="height: 100%; justify-content: flex-end; flex-direction: column;margin-top:110px"></div>
					</div>

					<div class="write" data-chat-option>
						<form class="flex flex-jc-fe flex-ai-center padding--20l padding--20r">
							<?php sboardDefineFormAction('ajax', 'sendChat', SwapBoard\Controllers\Admin\ChatMessagesController::class); ?>
							<input type="text" name="content" placeholder="Type your message here..." data-emojiable="true">
							<input type="hidden" name="userID" value="<?php echo $user_ID; ?>">
							<input type="hidden" name="chatID" value="">
							<span data-swap-button="send-chat" title="Send message"><i class="fa fa-paper-plane" aria-hidden="true"></i></span>
						</form>
					</div>
				</div>
			</div>
		</div>

		<?php else: ?>
		<p>No chats found! Go to your <a href="#member-list" class="tbntabs">Members List</a> to chat with someone!</p>
		<?php endif; ?>
	</div>
</div>
<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

<script>
	jQuery(function() {
		if ($('#private-messages').is(':visible')) {
			const messageBody = document.querySelector('.active-chat')
			messageBody.scrollTop = messageBody.scrollHeight - messageBody.clientHeight
			alert('ss')
		}

		window.emojiPicker = new EmojiPicker({
			emojiable_selector: '[data-emojiable=true]',
			assetsPath: '<?php echo plugin_dir_url(__FILE__); ?>assets/images',
			popupButtonClasses: 'fa fa-smile-o'
		});

		window.emojiPicker.discover();
	})
</script>